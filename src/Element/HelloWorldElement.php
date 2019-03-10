<?php

namespace Acme\ContaoHelloWorldBundle\Element;

class HelloWorldElement extends \ContentElement
{
    /**
     * @var string
     */
    protected $strTemplate = 'ce_helloWorld';
    

    /**
     * Displays a wildcard in the back end.
     *
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE') {
            $template = new \BackendTemplate('be_wildcard');

            $template->wildcard = '### '.utf8_strtoupper($GLOBALS['TL_LANG']['CTE']['helloWorld'][0]).' ###';
            $template->title = $this->headline;
            $template->id = $this->id;
            $template->link = $this->name;

            return $template->parse();
        }

        return parent::generate();
    }

    /**
     * Generates the module.
     */
    protected function compile()
    {
        $messageGenerator = \Contao\System::getContainer()->get('acme.contao_hello_world_bundle.message_generator');

        $message = $messageGenerator->sayHelloTo('Delos');

        $this->Template->message = $message;
    }
}
