<?php
namespace phpooya\fm\core;

use Exception;
use phpooya\fm\helper\Env;

trait TypeHints
{
    public function initialTypeHints()
    {
        if (Env::get('env') === 'develop') {
            $this->validateTypeHints();
        }
    }

    public function validateTypeHints()
    {
        $typeHintsCallablePairs = $this->typeHintsCallablePairs();

        foreach ($this->getTypeHints() as $attr => $type) {
            if (is_string($type) and array_key_exists($type, $typeHintsCallablePairs)) {
                $if = call_user_func($typeHintsCallablePairs[$type], $this->$attr);
            }
            elseif (is_callable($type)) {
                $if = call_user_func($type, $this->$attr);
                $type = "?";
            }
            else {
                $if = $this->$attr instanceof $type;
                $type = get_class($this);
            }

            if (!$if) {
                throw new Exception(sprintf("attribute '%s' must be '%s', '%s' given", $attr, $type, gettype($this->$attr)));
            }
        }
    }

    public function typeHintsCallablePairs()
    {
        return [
            'string' => 'is_string',
            'int' => 'is_int',
            'integer' => 'is_integer',
            'callable' => 'is_callable',
            'object' => 'is_object',
            'array' => 'is_array',
            'bool' => 'is_bool',
            'countable' => 'is_countable',
            'dir' => 'is_dir',
            'double' => 'is_double',
            'executable' => 'is_executable',
            'file' => 'is_file',
            'finite' => 'is_finite',
            'resource' => 'is_resource',
            'scalar' => 'is_scalar',
            'real' => 'is_real',
            'readable' => 'is_readable',
            'numeric' => 'is_numeric',
            'null' => 'is_null',
            'nan' => 'is_nan',
            'long' => 'is_long',
            'link' => 'is_link',
            'iterable' => 'is_iterable',
            'infinite' => 'is_infinite',
            'float' => 'is_float'
        ];
    }

    abstract public function getTypeHints();
}