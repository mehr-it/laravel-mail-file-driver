# laravel-mail-file-driver
A Laravel Mail driver that saves messages to disk for testing/ci purposes.

## Install
```bash
composer require mehr-it/laravel-mail-file-driver
```

## Replace default laravel mail manager in /config/app.php

This is usually not required when using package autoloading.

```php
return [
  'providers' => [
    # ...
    
    #Illuminate\Mail\MailServiceProvider::class,
    Mmeyer2k\LaravelMailFile\MailFileServiceProvider::class,
    
    # ...
  ],
];
```

## Add to .env
```ini
MAIL_MAILER=file
```

## Custom storage location in .env
By default, messages are saved to path returned by `sys_get_temp_dir()`.
```ini
MAIL_FILE_PATH=/path/to/storage
```
