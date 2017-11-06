<?php
namespace Iwanli\Repository\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;

class PresenterCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'any:presenter {name}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new presenter';

    protected $type = 'Presenter';

    /**
     * 实现抽象类 getStub 方法
     * @author 晚黎
     * @date   2017-11-06
     * @return [type]     [description]
     */
    protected function getStub()
    {
        return __DIR__.'/../stubs/Presenter.stub';
    }
    /**
     * 重写根命名空间
     * @author 晚黎
     * @date   2017-11-06
     * @return [type]     [description]
     */
    protected function rootNamespace()
    {
        return $this->laravel->getNamespace().$this->getPresenterNamespace();
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
        $name = str_replace_first($this->rootNamespace(), '', $this->getPresenterNamespace().$name);
        return $this->laravel['path'].'/'.str_replace('\\', '/', $name).'Presenter.php';
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
     * 获取 presenter 目录名称
     * @author 晚黎
     * @date   2017-11-06
     * @return [type]     [description]
     */
    public function getPresenterNamespace()
    {
        return str_replace('/', '\\', config('repository.paths.presenters', 'Repositories/Presenters'));
    }

}