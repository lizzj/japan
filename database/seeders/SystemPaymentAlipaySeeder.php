<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemPaymentAlipaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('system_payment_alipay')->insert(
            [
                'name' => '默认支付',
                'app_id' => '2021002165642075',
                'app_secret_cert'=>'MIIEvwIBADANBgkqhkiG9w0BAQEFAASCBKkwggSlAgEAAoIBAQDiSAx1Qb+XH3Te3AQU675Ut//fni36ZX1eSoYzmej7FMhOij7KlKP0tFCE4PtdAX39G51dmUgygVeaimfXLwegnHSIY9023Mn6zsVkQyhWh+P2CrP770c4oPZ49bIZqfI1NX1/v09Luhd8yIt4hH3uGrXFYlfhtYjWFORNwn1IkreVIAeXC1K54eiGf8GzNT4rM9ALjgrdux/qiVL9Dp1ABbWQbN9xfHfxc8ZyWegDVM3j0h3tuoY4FO47UXw6drmQpMfOizsgSKAUX9aUnRKbNehjSZxkaezxM5Wj8ysZ3ns3TzgvcurYYEFKv+VIzpVjt9SCCbs60XMkfAF7oSDpAgMBAAECggEBAMISKR0oFrn2MLYy3Q1UYxkl9j5D3As1oCCOqir3hepSGLnDt7bnZPcq7yQIEY3jCbtbQ8xS+qjWZdwVeJoFq/UEOq3/eGrlUhXZ4VHsh1wvkEQlSdh5kAvxgXKcxvNb3m/kQI6f9dJs+Ff9aCElARyFrABuKBFdMM7rfCN0+x6RmiW+zvcC6T5L6IB4ibgtiIgYClu3ncPfeAjx2l0xHtrbr7TEWidurzCGLo7fBIFp2DN1fGNgQW1vsOcRjPaVZxtSEm6CCErNwgMezEFZAS3PJehQzPEkJjlhS5E85dw3r9M8qVrq+ys2lMt85XNC91SiIs9/vNa/hnj3qfJ2PQECgYEA8nEJykJ1BMrvfJszYGcTQG2y/6DMWAm6nzIoysMMQw255JUo/mQ4MYRISWhHu7zxdSXEQlbExWt/uBHzeiPssPSHjJsG6Z6fUBEGPsHcNLslV47KrqmhhPkYpDZndTvGVuZcqq72LFH02EpE3pR8li+JKIBmInSEg4D5KkuNaJUCgYEA7u+mppqufzCCKtxa1dEXa+W53KR2YN4SKBG/CERzUn2GbiotJdzENWDB0/Pty1pc0TZgbDNb5ebPzvGb27hgpxqBcNUghn+9OJ37J07UrSpkkgju6MP1svdE98GaCK6FGpMO/QjiX4td7cP9K/D8CEc7UViQYAzuJFwILvPiPgUCgYANxraTs6sKlq19GySUOccyRgmB1RVHe2YLXcJLo0GzHbiOcJtfuTooNigVY8OPu3DNA1RfoKaVwUIEp6B6NEhi1cJODxEZfVX4Kr98GW/13xyEGS0TN7hh4fWwfxbp5neiwHxLhp2ebxnGoJHBRBbAQfs9Pe6PzqcpAc8mxBxI8QKBgQC1pjxsLOy8hYRwUVY9d9j2jo/ezqmwuyPSkqtI/cEu1X9+AVKRlmUUr5qsKKaAExK9ezmTCPi0r+UMz2JOiL3yTJRb06wGlNamVHS8TZIilDghTelTzKbeiF5GfUk9kHBg46xhcn+nY6zlNjsjTPJO2Nif31TjsPDbc5xFFeTKgQKBgQCudClOxBii5XAB5MmSXIkJ9XKTQfiKxh1KCJWQq4YrCDYCnfbk+024WGNGCUxUro5yAcU8b+5f7clQPkldlLcahKtJ93sOv82XdobCsnsXUjdpZqnL5fxSXXoBcO7NNmUrwWimlEE/zYg7FHm6ZrajG16E8koFgp3wi7/fTa1qUQ==',
                'app_secret_cert_file'=>'./Default/Alipay/appSecretCert.txt',
                'app_public_cert_path'=>'./Default/Alipay/appCertPublicKey_2021002165642075.crt',
                'alipay_public_cert_path'=>'./Default/Alipay/Default/alipayCertPublicKey_RSA2.crt',
                'alipay_root_cert_path'=>'./Default/Alipay/alipayRootCert.crt',
                'mode'=>0,
                'mode_type'=>'normal',
                'status' => 'on',
                'created_at' => time()
            ]
        );
    }
}
