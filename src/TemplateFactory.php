<?php

namespace Oira;

class TemplateFactory
{
    /** @var string テンプレートのベースディレクトリ */
    private $base_dir;

    public function __construct($base_dir)
    {
        $this->base_dir = rtrim($base_dir, '\\/');
    }

    public function create(string $name, array $params) {
        return new Template("{$this->base_dir}/_base.phtml", [
            'main' => "{$this->base_dir}/{$name}.phtml"
        ] + $params);
    }

}