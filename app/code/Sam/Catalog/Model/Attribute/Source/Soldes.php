<?php
namespace Sam\Catalog\Model\Attribute\Source;
 
class Soldes implements \Magento\Framework\Data\OptionSourceInterface
{
    protected $emp;
    protected $_eavConfig;

    public function __construct(\Magento\Eav\Model\Config $eavConfig

    )
    {
       
        $this->_eavConfig = $eavConfig;
    }
 
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->getOptionArray();
        foreach ($availableOptions as $key => $value) {
			$options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
 
    public  function getOptionArray()
    {

		$attribute = $this->_eavConfig->getAttribute('catalog_product', 'soldes');
        $options = $attribute->getSource()->getAllOptions();
        $floor=[];
        foreach ($options as  $value) {
            $floor[$value['value']]=$value['label'];

        }
       
        return $floor;
    }
}