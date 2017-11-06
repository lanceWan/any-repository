<?php
namespace Iwanli\Repository\Commands;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;
class RepositoryCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'any:repository {name}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository';

    protected $type = 'Repository';

    /**
     * 实现抽象类 getStub 方法
     * @author 晚黎
     * @date   2017-11-03
     * @return [type]     [description]
     */
    protected function getStub()
    {
        return __DIR__.'/../stubs/RepositoryEloquent.stub';
    }
    /**
     * 重写根命名空间
     * @author 晚黎
     * @date   2017-11-03
     * @return [type]     [description]
     */
    protected function rootNamespace()
    {
        return $this->laravel->getNamespace().$this->getRepositoryNamespace();
    }
    /**
     * 重写文件路径方法
     * @author 晚黎
     * @date   2017-11-03
     * @param  [type]     $name [description]
     * @return [type]           [description]
     */
    protected function getPath($name)
    {
        $name = str_replace_first($this->rootNamespace(), '', $this->getRepositoryNamespace().$name);
        return $this->laravel['path'].'/'.str_replace('\\', '/', $name).'Repository.php';
    }
    

    /**
     * 创建文件
     * @author 晚黎
     * @date   2017-11-03
     * @param  [type]     $name [description]
     * @return [type]           [description]
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        $class = str_replace($this->getNamespace($name).'\\', '', $name);

        $model = config('repository.paths.rootNamespace', 'App\\').config('repository.paths.model', 'Models').'\\'.$class;

        return str_replace(['DummyNamespace', 'DummyClass', 'DummyModel'],
            [$this->getNamespace($name), $class, $model],
            $stub);
    }
    
    /**
     * 获取 repository 目录名称
     * @author 晚黎
     * @date   2017-11-03
     * @return [type]     [description]
     */
    public function getRepositoryNamespace()
    {
        return str_replace('/', '\\', config('repository.paths.repositories', 'Repositories/Eloquent'));
    }

}