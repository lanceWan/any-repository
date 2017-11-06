# Laravel 5 any-repository

> `any-repository` 个人代码习惯编写扩展，写代码的时候经常重复的创建一些类或，强迫症的我坚决忍受不了，于是 any-repository 就诞生了。代码生成习惯是根据个人来的，不一定适合你，安装请慎重。

> 声明：本扩展基于 [https://github.com/andersao/l5-repository](https://github.com/andersao/l5-repository) repository部分源码是直接 cpoy 过来的。


## 安装 Any-repository
执行以下命令安装最新稳定版本:

```
composer require iwanli/any=1.*
```

**Laravel >= 5.5**

自动加载服务不需要配置。

**Laravel < 5.5**

```php
'providers' => [
    ...
	Iwanli\Repository\RepositoryServiceProvider::class,
],
```

发布配置文件:

```
php artisan vendor:publish --tag=any
```

命令完成后，会添加一个`any.php`配置文件到您的配置文件夹 如 : `config/any.php`。



## 建议和反馈
`Any` 发展离不开大家的反馈和建议，如果大家有什么想法可以直接在 [https://github.com/lanceWan/any/issues](https://github.com/lanceWan/any/issues) 中提出，谢谢。

Laravel学习交流群：`312621686`