<?php
namespace Iwanli\Repository\Commands;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;
class ServiceCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'any:service {name}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service';

    protected $type = 'Service';

    /**
     * 实现抽象类 getStub 方法
     * @author 晚黎
     * @date   2017-11-06
     * @return [type]     [description]
     */
    protected function getStub()
    {
        return __DIR__.'/../stubs/Service.stub';
    }
    /**
     * 重写根命名空间
     * @author 晚黎
     * @date   2017-11-06
     * @return [type]     [description]
     */
    protected function rootNamespace()
    {
        return $this->laravel->getNamespace().$this->getServiceNamespace();
    }
    /**
     * 重写文件路径方法
     * @author 晚黎
     * @date   2017-11-06
     * @param  [type]     $name [description]
     * @return [type]           [description]
     */
    protected function getPath($name)
    {
        $name = str_replace_first($this->rootNamespace(), '', $this->getServiceNamespace().$name);
        return $this->laravel['path'].'/'.str_replace('\\', '/', $name).'Service.php';
    }
    

    /**
     * 创建文件
     * @author 晚黎
     * @date   2017-11-06
     * @param  [type]     $name [description]
     * @return [type]           [description]
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        $class = str_replace($this->getNamespace($name).'\\', '', $name);

        return str_replace(['DummyNamespace', 'DummyClass'],
            [$this->getNamespace($name), $class],
            $stub);

    }
    
    /**
     * 获取 service 目录名称
     * @author 晚黎
     * @date   2017-11-06
     * @return [type]     [description]
     */
    public function getServiceNamespace()
    {
        return str_replace('/', '\\', config('repository.paths.services', 'Services'));
    }

}