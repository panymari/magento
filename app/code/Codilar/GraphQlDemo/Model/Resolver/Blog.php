<?php

namespace Codilar\GraphQlDemo\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\Resolver\Value;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;

class Blog implements ResolverInterface
{
    protected ObjectManagerInterface $objectManager;

    public function __construct(ObjectManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * @param Field $field
     * @param ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return Value|mixed
     * @throws \Exception
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        try {
            $valueFactory = $this->objectManager->get('Magento\Framework\GraphQl\Query\Resolver\ValueFactory');

            $blog = $this->getBlogArray();
            $result = function () use ($blog) {
                return !empty($blog) ? $blog : [];
            };
            return $valueFactory->create($result);
        } catch (\Exception $exception) {
            throw  new \Exception(__($exception->getMessage()));
        }
    }

    /**
     * @return array
     */
    private function getBlogArray(): array
    {
        return [
            'entity_id' => 1,
            'blog_name' => 'Block name',
            'author' => 'Author Name',
            'blog_content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit."
        ];
    }
}
