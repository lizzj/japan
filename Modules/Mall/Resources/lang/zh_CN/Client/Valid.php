<?php
/**
 * @Notes:
 * @author: Je t'aime
 * @Time: 2021/11/4 10:38
 */
return [
    'General' => [
        'Sms' => [
            'Send' => [
                'phone.required' => '手机号码--非空',
                'phone.regex' => '手机号码--错误',
                'phone.not_in' => '手机号码--冻结',
                'type.required' => '发送类型--非空',
                'type.in' => '发送类型--错误',
                'kind.required' => '发送类--非空',
                'kind.in' => '发送类--错误'
            ]
        ]
    ],
    'Auth' => [
        'Login' => [
            'Account' => [
                'account.required' => '登录账号--非空',
                'password.required' => '登录密码--非空'
            ],
            'Phone' => [
                'phone.required' => '手机号码--非空',
                'phone.regex' => '手机号码--错误',
                'phone.not_in' => '手机号码--已冻结',
                'code.required' => '验证码--非空',
                'code.digits' => '验证码--错误'
            ],
            'Find' => [
                'phone.required' => '手机号码--非空',
                'phone.not_in' => '手机号码--限制',
                'phone.regex' => '手机号码--错误',
                'code.required' => '验证码--非空',
                'code.digits' => '验证码--错误',
                'password.required' => '密码--非空',
                'password.min' => '密码--最少6位',
                'password.max' => '密码--最多16位',
                'password.alpha_num' => '密码--字母和数字'
            ],
            'Register' => [
                'password.required' => '密码--非空',
                'password.min' => '密码--最小6位',
                'password.max' => '密码--最大16位',
                'password.alpha_num' => '密码--字母和数字',
                'phone.required' => '手机号码--非空',
                'phone.regex' => '手机号码--错误',
                'phone.unique' => '手机号码--已注册',
                'phone.not_in' => '手机号码--限制',
                'code.required' => '验证码--非空',
                'code.digits' => '验证码--错误',
                'pid.required' => '上级id--非空',
                'name.required' => '姓名--非空',
                'check.required' => '注册协议--非空',
                'check.accepted' => '注册协议--非空(1)'
            ]
        ],
        'Base' => [
            'Info' => [
                'name.required' => '姓名--非空',
                'avatar.required' => '头像--非空',
                'sex.required' => '性别--非空',
                'sex.in' => '性别--错误'
            ]
        ]
    ],
    'System' => [
        'Version' => [
            'Version' => [
                'platform.required' => '平台--非空',
                'platform.in' => '平台--错误',
                'version.required' => '版本号--非空'
            ]
        ]
    ],
    'Member' => [
        'Center' => [
            'Level' => [
                'Payment' => [
                    'level_id.required' => '购买的级别id--非空',
                    'level_id.numeric' => '级别id--错误',
                    'type.required' => '付款方式--非空',
                    'type.in' => '付款方式--错误'
                ]
            ]
        ],
        'Asset' => [
            'Balance' => [
                'Payment' => [
                    'online_id.required' => '充值ID--非空',
                    'online_id.numeric' => '充值ID--错误',
                    'type.required' => '付款方式--非空',
                    'type.in' => '付款方式--错误'
                ]
            ]
        ],
        'Withdrawal' => [
            'Log' => [
                'Create' => [
                    'withdrawal_num.required' => '提现金额--非空',
                    'withdrawal_num.numeric' => '提现金额--错误',
                    'withdrawal_num.min' => '提现金额--最小1',
                    'type_id.required' => '提现方式--非空',
                    'type_id.numeric' => '提现方式--错误',
                    'name.required' => '账户姓名--非空',
                    'account.required' => '账户账号--非空',
                ]
            ]
        ],
        'Base' => [
            'Address' => [
                'Create' => [
                    'name.required' => '收货人--非空',
                    'phone.required' => '手机号码--非空',
                    'phone.regex' => '手机号码--错误',
                    'province.required' => '收货省--非空',
                    'city.required' => '收货市--非空',
                    'area.required' => '收货区--非空',
                    'address.required' => '收货详细地址--非空',
                    'default.required' => '默认--非空',
                    'default.in' => '默认--错误'
                ]
            ]
        ]
    ]
];
