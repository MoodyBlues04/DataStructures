<?php

namespace DataStructures\node;

class TreeNode
{
    public mixed $value;
    public ?TreeNode $right;
    public ?TreeNode $left;

    public function __construct(
        mixed $value = null,
        ?TreeNode $right = null,
        ?TreeNode $left = null
    ) {
        $this->value = $value;
        $this->right = $right;
        $this->left = $left;
    }
}
