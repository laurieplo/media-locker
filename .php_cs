<?php

$header = <<<'EOF'
NOTICE OF LICENSE

This source file is licensed exclusively to Laurie Plociennik.

@copyright   Copyright © 2017 Laurie Plociennik
@license     All rights reserved
@author      Laurie Plociennik
EOF;

return PHPCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR2' => true,
        'psr4' => true,
        'binary_operator_spaces' => ['align_equals' => true, 'align_double_arrow' => true],
        'whitespace_after_comma_in_array' => true,
        'array_syntax' => array('syntax' => 'short'),
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_order' => false,
        'single_quote' => true,
        'no_unused_imports' => true,
        'no_extra_consecutive_blank_lines' => ['extra', 'continue', 'return', 'throw', 'curly_brace_block', 'parenthesis_brace_block', 'square_brace_block'],
        'no_empty_phpdoc' => true,
        'no_empty_comment' => true,
        'header_comment' => array('header' => $header, 'commentType' => 'PHPDoc'),
        'no_whitespace_in_blank_line' => true,
        'single_blank_line_before_namespace' => true,
        'no_empty_statement' => true,
        'blank_line_after_opening_tag' => false,
        'no_leading_import_slash' => true,
        'no_leading_namespace_whitespace' => true,
        'no_trailing_comma_in_list_call' => true,
        'ordered_imports' => true,
        'trailing_comma_in_multiline_array' => true,
        'standardize_not_equals' => true,
        'no_leading_namespace_whitespace' => true,
        'object_operator_without_whitespace' => true,
        'no_blank_lines_after_class_opening' => true,
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in('src')
    );