<?php

/*
 * 用户信息相关
 */


use app\v1\model\UserLog;

class User {

    /**
     * 用户登录
     * @desc 提交方式：post
     * @return int     code 操作码（20009:失败; 20000:成功）
     * @return int     errNum  错误总数（错误：1；成功：0）
     * @return string  retMsg 提示信息，如：'添加成功'
     * @return array   retData Token
     */
    public function login(){

      if (request()->isPost()){
          $data = request()->post();
          //密码加密
          $map['password'] = $data['password'] = sha1(md5($data['password']));
          $map['tel'] = $data['tel'];
          //登录验证
          $result = \app\v1\model\User::where($map)->find();

          if (null === $result){
              $info = [
                  'errNum'=>1,
                  'retMsg'=>'用户名或密码错误',
                  'retData'=>'1',
                  'status'=>203

              ];

              return json($info);
          }else{
              //检查用户是否有登录记录
              $userLog = new UserLog();
              $check = $userLog->where('userid',$result['id'])->find();
              if (null === $check){
                  $log['userid'] = $result['id'];
                  $log['times']=1;
                  $log['updated'] = time();
                  $log['token'] = $this->random();

                  $currentLog = $userLog->save($data);
                  $token = $currentLog->token;
              }

              $info = [
                  'errNum'=>0,
                  'retMsg'=>'登录成功',
                  'retData'=>$token,
                  'status'=>200
              ];

              return json($result);
          }
      }else{
          $info = [
              'errNum'=>1,
              'retMsg'=>'请求方式出错',
              'retData'=>'1'
          ];
          return json($info);
      }
    }

    /*
     * 用户注册接口
     */
    public function register(){

        if(request()->isPost()){

            $data = request()->post();
            $data['password'] = sha1(md5($data['password']));
            $data['status'] = 1;

            $userModel = new \app\v1\model\User();
            $result = $userModel->allowField(true)->save($data);

            if (false ===$result){
                $info = [
                    'errNum'=>1,
                    'retMsg'=>'注册失败',
                    'retData'=>'1',
                    'status'=>203
                ];
                return json($info);
            }else{
                $info = [
                    'errNum'=>0,
                    'retMsg'=>'注册成功',
                    'retData'=>'1',
                    'status'=>201
                ];
                return json($info);
            }
        }
    }
    /**
     * API_DOC 设置方法传参
     * @return array
     */
    public function getRules()
    {
        return [
            'login' => [
                'tel' => [
                    'name'    => 'tel',
                    'type'    => 'int',
                    'min'     => 11,
                    'require' => true,
                    'desc'    => '电话号码'
                ],
                'password' => [
                    'name'    => 'password',
                    'type'    => 'int',
                    'min'     => 6,
                    'require' => true,
                    'desc'    => '登录密码'
                ]
            ],

            'register' => [
                'userIds' => [
                    'name'    => 'user_ids',
                    'type'    => 'array',
                    'format'  => 'explode',
                    'require' => true,
                    'default' => '10',
                    'range'   => [10,100],
                    'desc'    => '用户ID，多个以逗号分割'
                ],
            ],
        ];
    }
}