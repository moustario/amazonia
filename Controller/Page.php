<?php

class Page
{
    public string $template;

    public function render_view($data)
    {
        extract($data);
        require($this->template);
    }

    public function __construct(string $template)
    {
        $this->template = $template;
    }
}
