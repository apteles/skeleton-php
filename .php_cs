<?php declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
   ->exclude('config')
    ->in(__DIR__);

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        'strict_param' => true,
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => ['sortAlgorithm' => 'length'],
        'no_unused_imports' => true,
        'native_function_invocation' => true,
        'lowercase_cast' => true,
        'phpdoc_to_param_type' => false,
        'declare_strict_types' => true,
        'no_unset_on_property' => true,
        // 'class_attributes_separation' => ['elements' => ['const', 'method', 'property']],
        'no_useless_else' => true,
        'no_useless_return' => true,
        'psr4' => true,
        'ternary_to_null_coalescing' => true,
        'void_return' => true,
        'visibility_required' => ['property', 'method', 'const'],
        'linebreak_after_opening_tag' => true
    ])
    ->setFinder($finder);
