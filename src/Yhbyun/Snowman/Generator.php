<?php namespace Yhbyun\Snowman;

use Yhbyun\Snowman\Filesystem\Filesystem;
use Yhbyun\Snowman\Compilers\TemplateCompiler;

class Generator
{
    /**
     * @var Filesystem
     */
    protected $file;

    /**
     * @param Filesystem $file
     */
    public function __construct(Filesystem $file)
    {
        $this->file = $file;
    }

    /**
     * Run the generator
     *
     * @param $templatePath
     * @param $templateData
     * @param $filePathToGenerate
     * @return mixed
     */
    public function make($templatePath, $templateData, $filePathToGenerate)
    {
        // We first need to compile the template,
        // according to the data that we provide.
        $compiler = new TemplateCompiler;

        $template = $this->compile($templatePath, $templateData, $compiler);
        $filePathToGenerate = $compiler->compile($filePathToGenerate, $templateData);

        // Now that we have the compiled template,
        // we can actually generate the file.
        $this->file->make($filePathToGenerate, $template);

        return $filePathToGenerate;
    }

    /**
     * Compile the file
     *
     * @param $templatePath
     * @param  array             $data
     * @param  TemplateCompiler  $compiler
     * @throws UndefinedTemplate
     * @return mixed
     */
    public function compile($templatePath, array $data, TemplateCompiler $compiler)
    {
        return $compiler->compile($this->file->get($templatePath), $data);
    }
}
