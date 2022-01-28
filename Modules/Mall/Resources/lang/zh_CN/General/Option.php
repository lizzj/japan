<?php
/**
 * @Notes:
 * @author: Je t'aime
 * @Time: 2021/9/30 16:23
 */
return [
    'General' => [
        'Sex' => [
            'm' => '男',
            'w' => '女',
            'o' => '其他'
        ],
        'Type' => [
            'inc' => '增加',
            'dec' => '核减'
        ],
        'Audit' => [
            'no' => '未审核',
            'pass' => '审核通过',
            'reject' => '审核拒绝'
        ],
        'Week' => [
            'monday' => '星期一',
            'tuesday' => '星期二',
            'wednesday' => '星期三',
            'thursday' => '星期四',
            'friday' => '星期五',
            'saturday' => '星期六',
            'sunday' => '星期日',
        ]
    ],
    'Payment' => [
        'Type' => [
            'online' => '在线充值',
            'level' => '开通会员'
        ],
        'Option' => [
            'alipay' => '支付宝支付',
            'wechat' => '微信支付'
        ],
        'Mode' => [
            'normal' => '普通模式',
            'service' => '服务商模式'
        ],
        'Scene' => [
            'web' => '网页支付',
            'app' => 'APP支付',
            'mini' => '小程序支付',
            'wap' => 'H5支付',
            'scan' => '扫码支付'
        ]
    ],
    'System' => [
        'Version' => [
            'Platform' => [
                'android' => '安卓平台',
                'ios' => 'IOS平台'
            ],
        ],
        'Swipe' => [
            'Location' => [
                'index' => '首页',
                'category' => '分类页'
            ],
            'Link' => [
                'goods' => '商品',
                'center' => '个人中心'
            ]
        ]

    ],
    'Balance' => [
        'Source' => [
            'adminInc' => '后台增加',
            'adminDec' => '后台核减',
            'orderExpense' => '订单消费',
            'orderRefund' => '订单退款',
            'rechargeAlipay' => '充值-支付宝',
            'rechargeWechat' => '充值-微信'
        ]
    ],
    'Commission' => [
        'Source' => [
            'adminInc' => '后台增加',
            'adminDec' => '后台核减',
            'levelReward' => '开通会员奖励',
            'rechargeReward' => '在线充值奖励',
            'applyWithdrawal' => '申请提现',
            'rejectWithdrawal' => '提现审核失败'
        ]
    ],
    'Order' => [
        'Status' => [
            'refund' => '已退款',
            'pay' => '已付款',
            'ing' => '正在处理',
            'finish' => '处理完成'
        ]
    ]
];
