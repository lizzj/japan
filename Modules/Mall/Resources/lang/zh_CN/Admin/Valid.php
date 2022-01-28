<?php
/**
 * @Notes:
 * @author: Je t'aime
 * @Time: 2021/11/5 8:41
 */
return [
    'Auth' => [
        'Login' => [
            'Account' => [
                'account.required' => '账号--非空',
                'password.required' => '密码--非空'
            ]
        ],
        'Base' => [
            'Info' => [
                'avatar.required' => '头像--非空',
                'name.required' => '姓名--非空',
                'phone.required' => '手机号码--非空',
                'phone.regex' => '手机号码--错误',
                'phone.not_in' => '手机号码--黑名单',
                'email.required' => '电子邮箱--非空',
                'email.regex' => '邮箱--错误'
            ],
            'Password' => [
                'old.required' => '原始密码--非空',
                'old.password' => '原始密码--错误',
                'password.required' => '新密码--非空',
                'password.alpha_num' => '新密码--字母和数字',
                'password.min' => '密码长度--最小6位',
                'password.max' => '密码长度--最大16位',
                'confirm.required' => '确认密码--非空',
                'confirm.same' => '确认密码--错误'
            ]
        ]
    ],
    'System' => [
        'Config' => [
            'Update' => [
                'name.required' => 'APP名称--非空',
                'logo.required' => 'APP-Logo--非空',
                'company.required' => '公司名称--非空',
                'description.required' => 'APP简介--非空',
                'service_phone.required' => '客服电话--非空',
                'service_qrcode.required' => '客服二维码--非空',
                'service_time.required' => '客服服务时间--非空',
            ]
        ],
        'Swipe' => [
            'Create' => [
                'name.required' => '轮播标题--非空',
                'link.required' => '是否链接--非空',
                'link.in' => '是否链接--错误',
                'goods_id.required_if' => '绑定商品--非空',
                'sort.required' => '排序--非空',
                'sort.numeric' => '显示排序--错误(1)',
                'sort.integer' => '显示排序--错误(2)',
                'location.required' => '显示位置--非空',
                'location.in' => '显示位置--错误(1)',
            ],
            'Update' => [
                'action.required' => '请求方式--非空',
                'action.in' => '请求方式--错误',
                'name.required_if' => '轮播标题--非空',
                'link.required_if' => '是否链接--非空',
                'link.in' => '是否链接--错误',
                'goods_id.required_if' => '链接商品--非空',
                'sort.required_if' => '显示排序--非空',
                'sort.numeric' => '显示排序--错误(1)',
                'sort.integer' => '显示排序--错误(2)',
                'location.required_if' => '显示位置--非空',
                'location.in' => '显示位置--错误(1)',
                'status.required_if' => '显示状态--非空',
                'status.in' => '显示状态--错误',
            ]
        ],
        'Version' => [
            'Create' => [
                'version.required' => '版本编号--非空',
                'version.unique' => '版本编号--已存在',
                'log.required' => '更新内容--非空',
                'log.*.option.distinct' => '更新内容--存在重复',
                'log.array' => '更新内容--数据类型错误',
                'platform.required' => '更新平台--非空',
                'platform.in' => '更新平台--错误',
                'url.required' => '安装包--非空'
            ],
            'Update' => [
                'action.required' => '请求方式--非空',
                'action.in' => '请求方式--错误',
                'log.required_if' => '更新内容--非空',
                'log.array' => '更新内容--数据类型错误',
                'log.*.option.distinct' => '更新内容--存在重复',
                'status.required_if' => '版本下载状态--非空',
                'status.in' => '版本下载状态--错误',
                'release.required_if' => '版本发布状态--非空',
                'release.in' => '版本发布状态--错误',
                'force.required_if' => '版本更新状态--非空',
                'force.in' => '版本更新状态--错误',
            ]
        ],
        'Online' => [
            'Create' => [
                'name.required' => '显示名称--非空',
                'name.unique' => '显示名称--已存在',
                'price.required' => '支付金额--非空',
                'price.numeric' => '支付金额--数字类型',
                'price.min' => '支付金额--最小0',
                'price.unique' => '支付金额--已存在',
                'actual.required' => '实际充值金额--非空',
                'actual.numeric' => '实际充值金额--数字类型',
                'actual.min' => '实际充值金额--最小0',
                'tip.required' => '充值提示--非空',
            ],
            'Update' => [
                'action.required' => '请求方式--非空',
                'action.in' => '请求方式--错误',
                'name.required_if' => '显示名称--非空',
                'name.unique' => '显示名称--已存在',
                'price.required_if' => '支付金额--非空',
                'price.numeric' => '支付金额--数字类型',
                'price.min' => '支付金额--最小0',
                'price.unique' => '支付金额--已存在',
                'actual.required_if' => '实际充值金额--非空',
                'actual.numeric' => '实际充值金额--数字类型',
                'actual.min' => '实际充值金额--最小0',
                'tip.required_if' => '充值提示--非空',
                'status.required_if' => '显示状态--非空',
                'status.in' => '显示状态--错误',
                'sort.required_if' => '显示排序--非空',
                'sort.numeric' => '显示排序--错误',
                'sort.integer' => '显示排序--整数',
                'sort.min' => '显示排序--最小0',
            ]
        ],
        'Notice' => [
            'Create' => [
                'name.required' => '公告内容--非空',
                'link.required' => '公告链接状态--非空',
                'link.in' => '公告链接状态--错误',
                'link_type.required_if' => '公告链接类型--非空',
                'link_id.required_if' => '公告链接ID--非空',
            ],
            'Update' => [
                'action.required' => '请求方式--非空',
                'action.in' => '请求方式--错误',
                'name.required_if' => '公告内容--非空',
                'link.required_if' => '公告链接状态--非空',
                'link.in' => '公告链接状态--错误',
                'link_type.required_if' => '公告链接类型--非空',
                'link_id.required_if' => '公告链接ID--非空',
                'status.required_if' => '显示状态--非空',
                'status.in' => '显示状态--错误'
            ]
        ]
    ],
    'Member' => [
        'Center' => [
            'Level' => [
                'Create' => [
                    'name.required' => '级别名称--非空',
                    'name.unique' => '级别名称--已存在',
                    'icon.required' => '级别Icon--非空',
                    'weight.required' => '级别权重--非空',
                    'weight.unique' => '级别权重--已存在',
                    'weight.min' => '级别权重--最小0',
                    'weight.integer' => '级别权重--整数',
                    'description.required' => '级别折扣--最小0',
                ],
                'Update' => [
                    'action.required' => '请求方式--非空',
                    'action.in' => '请求方式--错误',
                    'name.required_if' => '级别名称--非空',
                    'name.unique' => '级别名称--已存在',
                    'icon.required_if' => '级别Icon--非空',
                    'weight.required_if' => '级别权重--非空',
                    'weight.unique' => '级别权重--已存在',
                    'weight.min' => '级别权重--最小0',
                    'weight.integer' => '级别权重--整数',
                    'description.required_if' => '级别折扣--最小0',
                    'status.required_if' => '显示状态--非空',
                    'status.in' => '显示状态--错误',
                ]
            ],
            'Member' => [
                'Update' => [
                    'action.required' => '请求方式--非空',
                    'action.in' => '请求方式--非空',
                    'level_id.required_if' => '级别分组--非空',
                    'type.required_if' => '调整类型--非空',
                    'type.in' => '调整类型--非空',
                    'num.required_if' => '调整数值--非空',
                    'num.numeric' => '调整数值--错误',
                    'num.min' => '调整数值--最小(0)',
                    'status.required_if' => '显示状态--非空',
                    'status.in' => '显示状态--错误',
                    'password.required_if' => '新密码--非空',
                    'password.min' => '新密码--最小6位',
                    'password.max' => '新密码--最大16位',
                    'password.alpha_num' => '新密码--字母和数字',
                    'confirm_password.required_if' => '确认密码--非空',
                    'confirm_password.same' => '确认密码--不一致',
                    'parent.required_if' => '上级状态--非空',
                    'parent.in' => '上级状态--错误',
                    'pid.required_if' => '上级id--非空',
                    'pid.integer' => '上级id--错误',
                    'pid.min' => '上级id--错误',
                ]
            ]
        ],
        'Withdrawal' => [
            'Config' => [
                'Update' => [
                    'description.required' => '提现简述--非空',
                    'poundage.required' => '提现手续费--非空',
                    'poundage.numeric' => '提现手续费--错误',
                    'poundage.integer' => '提现手续费--整数',
                    'poundage.min' => '提现手续费--最小(0)',
                    'poundage.max' => '提现手续费--最大(100)',
                    'min_num.required' => '提现最低限制--非空',
                    'min_num.numeric' => '提现最低限制--错误',
                    'min_num.integer' => '提现最低限制--整数',
                    'min_num.min' => '提现最低限制--最小(1)',
                    'base_num.required' => '提现基数--非空',
                    'base_num.numeric' => '提现基数--错误',
                    'base_num.integer' => '提现基数--整数',
                    'base_num.min' => '提现基数--最小(1)',
                    'base_num.max' => '提现基数--最大(100)',
                ]
            ],
            'Log' => [
                'Update' => [
                    'audit.required' => '审核状态--非空',
                    'audit.in' => '审核状态--错误',
                    'audit_result.required_if' => '拒绝原因--非空'
                ]
            ],
            'Type' => [
                'Create' => [
                    'name.required' => '方式名称--非空',
                    'name.unique' => '方式名称--已存在',
                    'icon.required' => '方式Icon--非空',
                    'code.required' => '方式CODE--非空',
                    'code.unique' => '方式CODE--已存在',
                ],
                'Update' => [
                    'action.required' => '请求方式--非空',
                    'action.in' => '请求方式--错误',
                    'name.required_if' => '提现方式--非空',
                    'name.unique' => '提现方式--已存在',
                    'code.required_if' => '方式Code--非空',
                    'code.unique' => '方式Code--已存在',
                    'icon.required_if' => '方式Icon--非空',
                    'sort.required_if' => '显示排序--非空',
                    'sort.numeric' => '显示排序--错误',
                    'sort.integer' => '显示排序--整数',
                    'sort.min' => '显示排序--最小1',
                    'status.required_if' => '显示状态--非空',
                    'status.in' => '显示状态--错误'
                ]
            ]
        ]
    ],
    'Payment' => [
        'Alipay' => [
            'Create' => [
                'name.required' => '备注名称--非空',
                'mode.required' => '支付模式--非空',
                'mode.in' => '支付模式--错误',
                'app_id.required' => '支付宝App_ID--非空',
                'service_provider_id.required_if' => '服务商模式,服务ID--非空',
                'app_secret_cert_file.required' => '应用私钥--非空',
                'app_public_cert_path.required' => '应用公钥证书--非空',
                'alipay_public_cert_path.required' => '支付宝公钥证书--非空',
                'alipay_root_cert_path.required' => '支付宝根证书--非空',
                'scene_lang.required' => '支付使用场景--非空',
                'scene_lang.array' => '支付使用场景--数据格式错误',
            ],
            'Update' => [
                'action.required' => '请求方式--非空',
                'action.in' => '请求方式--错误',
                'name.required_if' => '备注名称--非空',
                'name.unique' => '备注名称--已存在',
                'mode.required_if' => '支付模式--非空',
                'mode.in' => '支付模式--错误',
                'scene_lang.required_if' => '支付使用场景--非空',
                'app_id.required_if' => '支付宝App_ID--非空',
                'service_provider_id.required_if' => '服务商模式,服务ID--非空',
                'app_secret_cert_file.required_if' => '应用私钥--非空',
                'app_public_cert_path.required_if' => '应用公钥证书--非空',
                'alipay_public_cert_path.required_if' => '支付宝公钥证书--非空',
                'alipay_root_cert_path.required_if' => '支付宝根证书--非空',
                'status.required_if' => '状态--非空',
                'status.in' => '状态--错误'
            ]
        ],
        'Wechat' => [
            'Create' => [
                'name.required' => '备注名称--非空',
                'name.unique' => '备注名称--已存在',
                'mch_id.required' => '商户号--非空',
                'mode.required' => '支付模式--非空',
                'mode.in' => '支付模式--错误',
                'sub_mch_id.required_if' => '服务商模式--子商户商户号--非空',
                'mch_public_cert_path.required' => '商户公钥证书--非空',
                'mch_secret_cert_file.required' => '商户私钥--非空',
                'mch_secret_key.required' => '商户秘钥--非空',
                'sub_app_id.present' => '服务商模式--子app的app_id--存在可为空',
                'sub_mini_app_id.present' => '服务商模式--子小程序的app_id--存在可为空',
                'sub_mp_app_id.present' => '服务商模式--子公众号的app_id--存在可为空',
                'scene_lang.required' => '使用场景--非空',
                'scene_lang.array' => '使用场景--数据格式错误',
            ],
            'Update' => [
                'action.required' => '请求方式--非空',
                'action.in' => '请求方式--错误',
                'status.required_if' => '状态--非空',
                'status.in' => '状态--错误',
                'name.required_if' => '备注名称--非空',
                'name.unique' => '备注名称--已存在',
                'mch_id.required_if' => '商户号--非空',
                'mode.required_if' => '支付模式--非空',
                'mode.in' => '支付模式--错误',
                'sub_mch_id.required_if' => '服务商模式--子商户商户号--非空',
                'mch_public_cert_path.required_if' => '商户公钥证书--非空',
                'mch_secret_cert_file.required_if' => '商户私钥--非空',
                'mch_secret_key.required_if' => '商户秘钥--非空',
                'sub_app_id.present' => '服务商模式--子app的app_id--存在可为空',
                'sub_mini_app_id.present' => '服务商模式--子小程序的app_id--存在可为空',
                'sub_mp_app_id.present' => '服务商模式--子公众号的app_id--存在可为空',
                'scene_lang.required_if' => '使用场景--非空',
                'scene_lang.array' => '使用场景--数据格式错误',
            ]
        ],
    ],
    'Remind' => [
        'Config' => [
            'Update' => [
                'status.required' => '状态--非空',
                'status.in' => '状态--错误',
                'frequency.required_if' => '通知频率--非空',
                'frequency.integer' => '通知频率--数字',
                'frequency.min' => '通知频率--最小1',
                'default.required_if' => '默认通知--非空',
                'default.in' => '默认通知--错误',
                'week.required_if' => '通知时间(周)--非空',
                'week.array' => '通知时间(周)--错误',
                'hour.required_if' => '通知时间--非空',
                'hour.array' => '通知时间--错误',
            ]
        ],
        'Setting' => [
            'Update' => [
                'status.required' => '显示状态--非空',
                'status.in' => '显示状态--错误',
                'url.required_if' => '接口Url--非空',
                'secret.required_if' => '授权密钥--非空'
            ]
        ]
    ],
    'Article' => [
        'Category' => [
            'Create' => [
                'name.required' => '栏目名称--非空',
                'name.unique' => '栏目名称--已存在',
                'show.required' => '前端显示状态--非空',
                'show.in' => '前端显示状态--错误',
                'sort.required' => '显示排序--非空',
                'show.integer' => '显示排序--错误',
                'sort.min' => '显示排序--最小0',
            ],
            'Update' => [
                'action.required' => '请求方式--非空',
                'action.in' => '请求方式--错误',
                'name.required_if' => '栏目名称--非空',
                'show.required_if' => '前端显示状态--非空',
                'show.in' => '前端显示状态--错误',
                'sort.required_if' => '显示排序--非空',
                'sort.integer' => '显示排序--错误',
                'sort.min' => '显示排序--最小0',
                'status.required_if' => '显示状态--非空',
                'status.in' => '显示状态--错误'
            ]
        ],
        'Article' => [
            'Create' => [
                'name.required' => '文章标题--非空',
                'category_id.required' => '文章分类--非空',
                'short_description.required' => '文章简述--非空',
                'keywords.required' => '文章关键字--非空',
                'keywords.array' => '文章关键字--数组',
                'image.present' => '顶部图片--存在可为空',
                'content.required' => '文章内容--非空'
            ],
            'Update' => [
                'action.required' => '请求方式--非空',
                'action.in' => '请求方式--错误',
                'name.required_if' => '文章标题--非空',
                'category_id.required_if' => '文章分类--非空',
                'short_description.required_if' => '文章简述--非空',
                'keywords.required_if' => '文章关键字--非空',
                'keywords.array' => '文章关键字--数组',
                'image.required_if' => '顶部图片--存在可为空',
                'content.required_if' => '文章内容--非空',
                'sort.required_if' => '显示排序--非空',
                'sort.integer' => '显示排序--错误',
                'sort.min' => '显示排序--最小0',
                'status.required_if' => '显示状态--非空',
                'status.in' => '显示状态--错误'
            ]
        ]
    ],
    'Goods' => [
        'Category' => [
            'Create' => [
                'name.required' => '分类名称--非空',
                'name.unique' => '分类名称--已存在',
                'icon.required' => '分类Icon--非空',
                'pid.required' => '所属分类--非空',
                'pid.integer' => '所属分类--错误',
                'pid.min' => '所属分类--错误',
                'sort.required' => '分类排序--非空',
                'sort.integer' => '分类排序--错误',
                'sort.min' => '分类排序--最小(0)',
            ],
            'Update' => [
                'action.required' => '请求方式--非空',
                'action.in' => '请求方式--错误',
                'name.required_if' => '分类名称--非空',
                'name.unique' => '分类名称--已存在',
                'icon.required_if' => '分组Icon--非空',
                'sort.required_if' => '显示排序--非空',
                'sort.integer' => '显示排序--错误',
                'sort.min' => '显示排序--最小0',
                'status.required_if' => '显示状态--非空',
                'status.in' => '显示状态--错误',
            ]
        ]
    ]
];
