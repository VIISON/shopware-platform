<?php declare(strict_types=1);

namespace Shopware\Core\Framework\Test\DataAbstractionLayer\Reference\TestDefinition;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\Test\DataAbstractionLayer\Reference\TestField\NonUuidFkTestField;

class ReferenceTestDocumentDefinition extends EntityDefinition
{
    public function getEntityName(): string
    {
        return '_reference_test_document';
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            new NonUuidFkTestField('page_format_technical_name', 'pageFormatTechnicalName', ReferenceTestPageFormatDefinition::class, 'technicalName'),
            new ManyToOneAssociationField(
                'pageFormat',
                'page_format_technical_name',
                ReferenceTestPageFormatDefinition::class,
                'technical_name'
            ),
        ]);
    }
}
