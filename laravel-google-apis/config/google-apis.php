<?php

return [
    'client' => [
        'default' => [
            'options' => [
                'application_name' => 'GeoKing',
                'client_id' => '1075153362334-av21cd21ii8cafks8404m2ilo2565geb.apps.googleusercontent.com',
                'client_secret' => 'O-wwKi5v-wHluICEudeQWhVJ',
                'scopes' => [
                    'https://www.googleapis.com/auth/business.manage',
                    'profile',
                    'email',
                ],
                'developer_key' => '',
                'prompt' => 'consent',
                'include_granted_scopes' => true,
                'access_type' => 'offline',
                'approval_prompt' => 'auto',
                'api_format_v2' => true,
            ],
            'redirect_route' => ['integrations.store', ['provider' => 'google']],
        ],
        'communications' => [
            'options' => [
                'client_id' => '846793905794-l81ugq05grv9juda30db4mp65p37gn10.apps.googleusercontent.com',
                'client_secret' => 'JRM4lNG4TnMUN3TQ4h30WvV3',
                'application_name' => 'GeoKing',
                'scopes' => [
                    'https://www.googleapis.com/auth/businesscommunications',
                ],
                'developer_key' => '',
                'prompt' => 'consent',
                'include_granted_scopes' => true,
                'access_type' => 'offline',
                'approval_prompt' => 'auto',
                'api_format_v2' => true,
            ],
            'auth' => [
                'type' => 'service_account',
                'project_id' => 'api-project-257706',
                'private_key_id' => 'd512548a9d29170ed2a5f7cd3e60ab81b68995fd',
                'private_key' => "-----BEGIN PRIVATE KEY-----\nMIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCtOG/iiKrstNR/\nIhSQLANHQ9cNTfQlFuSXZkaWvZI9Mk6YchHiuG8NJkvtSTXA0nEXZt384NBPS4CW\n88hMz50Jv9+YtflIM31MOP23/da+N7sK8JzuDaAGeu9pBdO9j0WkzEK4yfpWSyT4\nJOi33M/zVItFMk+L3eC65zYub4QUQbZvNgs5FxCy/z2oq7XXl8m4uV1hoTlXPyqg\n9qbLHdImV3VHYBqeY8mofxVY7fmg+U8P8saGSEFtMxgGRxz2RRxvjGlHWMNLBYwl\nGm+OQieyJX8SyIUThomGWtcD5/Bv0eNDVYjCeIcJGHdUUwhS1eLGK5gA1DHdoJ+3\nHtN73j15AgMBAAECggEAGir++AV2cNjmiyguXBNSEXeFqtxeaCX7tYV9X3NW/si1\nR+Ffo1UCbcWdzcR0CuOfsw3WtkeOIJSC4gsE9NmeWyUx1aOT+5zPrm6joaKGyOip\naH8t7eaACMqUlVSMhsP4nOtAnyLgHx4uARCuWWxRu+xHN9ZgXvxPYVzhegVduiNt\nOqJU3RF8qGSDGokXVuHKE3t9pmsfw281M5jgC30qxkidBTbKWAIJ1ht8OSImrRlQ\nCcpSh7nRIHXUAMZog2PuPqFzKcGU6NTOg+30Ayrl0FffOJdnPLzz5BqsJMG9RCug\nvAT7hBaYzpzHuAfE+tdio/R5ERUCpMZrPFtR0aQM4wKBgQDqcQewZUXp/jqoxEh0\nD+U6XcosJsByqT2tSJXeTiDKZ6m5GPC45O9lLTeTjrzqk4vAooVmT+ofoNZCnd+Q\nLc34Z8r+5eVnjEW1/98x4ACpFQdlHs0jlvDuxYZ0ldTADdsbnXv2bzyGgVAsdT8x\nzmArZYsh8WFW4HAGWa1z5DpCWwKBgQC9JjTiQevRL7BjHZrXJTT/hF5wmHlresU2\nebgS23clukXbyI/yjmfD53Hnha+fRyRF9bLfNYtSSVT/9AyM+3HI6FwZYJ3qSR53\nFoT5d0+6wGUhMayZHWy4hsP1bjHAb5fwFbc+wKjTPGf6fGtaBlGOLZGUalXCmSV6\n7IJ/0xBfuwKBgQCYmCN6FCDykhBaQxApwyLf36Y1ILAIsdG8VU9/F/lN5TVajjo5\nDoInp8vR1oluYcUICICtvHxWQ9jSGXInpTi4Y86EJN0xjeLd+IKtMvEbHN3oWqkJ\nbji6IYVHozKMIzine9Tw7SxHHCo0FcihQYPlGz35ROSnqIQiDgLROQ8WmwKBgQCt\n99cKBuGS687Kyq7glJsTLDcETmjWvvtmKDtyNKJ4c8PO6r/isrGjkFrGO8IUuAUX\nx2y2OXQjwcjJBTkJ7jZwN66FtMRpeMjpdS/mlqMhO9WH2z1JMrQNX/4Z3TkrKjhP\nnFmHAQIGDvf/fbHrAga+wxCztb2dFuhPD/rTAFh+AwKBgCl78WirgrOGRAimxqlL\nFlxJ72VS8N9RLqoDwWVyU5Q22gZ75pASeREau2ujouCJp5CHnvuvoUlCwrSOk9v8\nnTpQIxqTdho2p/kYdINnvajvPWjoolINJ7CzKdbc/RIIZiWx3/4/DWQ5EKrQctoR\nNrsBDYFpac3bhNMpl5EF6nrv\n-----END PRIVATE KEY-----\n",
                'client_email' => 'gk-agent2@api-project-257706.iam.gserviceaccount.com',
                'client_id' => '103742386707692108873',
                'auth_uri' => 'https=>//accounts.google.com/o/oauth2/auth',
                'token_uri' => 'https=>//oauth2.googleapis.com/token',
                'auth_provider_x509_cert_url' => 'https=>//www.googleapis.com/oauth2/v1/certs',
                'client_x509_cert_url' => 'https=>//www.googleapis.com/robot/v1/metadata/x509/gk-agent2%40api-project-257706.iam.gserviceaccount.com',
            ],
        ],
        'messages' => [
            'options' => [
                'client_id' => '846793905794-l81ugq05grv9juda30db4mp65p37gn10.apps.googleusercontent.com',
                'client_secret' => 'JRM4lNG4TnMUN3TQ4h30WvV3',
                'application_name' => 'GeoKing',
                'scopes' => [
                    'https://www.googleapis.com/auth/businessmessages',
                ],
                'developer_key' => '',
                'prompt' => 'consent',
                'include_granted_scopes' => true,
                'access_type' => 'offline',
                'approval_prompt' => 'auto',
                'api_format_v2' => true,
            ],
            'auth' => [
                'type' => 'service_account',
                'project_id' => 'api-project-257706',
                'private_key_id' => 'af04bfd0e9f604f85b463933c7766eeea96cd6a5',
                'private_key' => "-----BEGIN PRIVATE KEY-----\nMIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQDDHacf9FhANrgl\n3vis5rdeoPfxvV95zO6+El/8xd9w+iCoXmlteH8L6bhX2Fry0ppTU9SP1296xDWd\ne9yHX74L6y4+tRbY4PJ1GnqIzYa3eq1bLs6bMrEHRFX5CmoYX2Cv4ur9FIuUOC9y\nNplR4EUt23VfdanGnm/2BcgwxCvHiDUVG5sCg6VKADKOuqDyK3rtTPwgL1qy6o+m\nBIK0aLMERPbiVYPKTJ89IAdvkLWFNHXVvJOERNwlndAQofQPDAFblM2/FLm8rNxo\nRODCcXiLzgndW7s1Pi6PHoF4+wu2VK+sGQ+1UdWMtsEUxHvLipiX0edz9rc9W/jP\nrLF46JEPAgMBAAECggEAE13ZHdHaBJ2pz5B/LGJGJy1hDuyWEnfl5pXaUzOsxwD8\nxtmAK25/ZcZQFuARvvJqgQTcH17p4Myi6bvGmuVE7tfsIitFVkeVqUv0h6mmyoVx\nuZA+z6bLbYY55ltDRqII7cxfOLmWVSLyiqqisz7IfxG+Z7g9HsrRICFYyoZeNhLB\nS/kpUiydyPJRaeiDRVD/e2wClL4LzkHbPxf0t/3WSIcVGb+acguCSgqqr4NyvG7l\nmSjIwf6cL5ukTU0iBde8299kn99zHldZUjpqWtQcryu5aDXE2BdsV/fLcaRLUmqc\nY63qxk9n6zlW13uSVp+D6OJtG2w/nSIWw+5/OXi7EQKBgQD7pwgEf/7a4ArZ7fQ6\nFCmwZ3EfXeDB6zOiG0J9hE1pzBdpXxJVUFpmslGWFz4yMRxyIB0AoqOxfTyN7i4r\nKCt3xlIhMj6PHNvc4jJ9Bf8q3VcvGr8SaJlG0KLkWDEVp3QVWyqGaKwHJROGIDLA\nveqDp53IHVgjzY1nT+WXzLqAmQKBgQDGfJSKYCAftkMsx0Q16sldaocNub4Q6sDT\nS23FHwFDENk7Jpg3+X7SHtvzuAbdN+44DGyI0Ltoq+23sDCD9DpG7p/OYmjhPJXw\nyFDIWwawQMSEa1tAFT4OI3XuOF9aB49iET6QsGdhmsnBb6dDuSMmb2xICWRopMAM\n8/EBquwf5wKBgAyzxafUfhy2KlYNuMIlumT5E7CtoGapZJXOInELeIzajGP5NIex\n4p5EafHVgoIuEG2CSXR6wSB4XdIcL6BmCqulCwg57QZ0QnTHxhyhbNvRCFGMXBCl\nzvbQGSjFetTI+wcI7wCRz/0cVfvzLBymeWvjzgcH1CcafQS197TN1KwhAoGAKwP2\nwSJh891xI3Qv8Stn5mneyPe3HD1z+pa/PFgi0uEE4w/TL1ZPyMPNUT1Rp4Gmi9kN\ncH0kEGQqSYPSj9ZPBu5SDc1AA4g4yozvDOzFP09aB4SoqvOvlirTNQRcjctTpKIu\nF/dTAFEmZliHPGMUHhFJuzbl3tPNl0EKuxzKvYMCgYBYpMa3fQ1VKEZJFGb3P1cR\nK1/KcK9H8eJKqdX+bB5VHVOp5IaGTd5gCBiV+4Bv/Ep6kX9TFD/vJ92YcadyKiUK\nXp9ccjtdBnAkLBw/vT0XnmALgZgbCcyShMTd7T+LOT4bAmEsF/OM8P23unmtdevt\n93kW1s05E+lKuI+yVPamXA==\n-----END PRIVATE KEY-----\n",
                'client_email' => 'gk-agent@api-project-257706.iam.gserviceaccount.com',
                'client_id' => '111731988939030989714',
                'auth_uri' => 'https=>//accounts.google.com/o/oauth2/auth',
                'token_uri' => 'https=>//oauth2.googleapis.com/token',
                'auth_provider_x509_cert_url' => 'https=>//www.googleapis.com/oauth2/v1/certs',
                'client_x509_cert_url' => 'https=>//www.googleapis.com/robot/v1/metadata/x509/gk-agent%40api-project-257706.iam.gserviceaccount.com',
            ],
        ],
    ],
    'attempts' => [
        'internal' => 100,
        'unauthorized' => 3,
        'resource_exhausted' => 10
    ],
];
