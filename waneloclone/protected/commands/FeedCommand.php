<?php

/*
 * @Author : Nanhe Kumar <nanhe.kumar@gmail.com>
 * Read feed from multiple sites
 */

class FeedCommand extends CConsoleCommand {

    protected static $_feedURL = array(
        'fabfurnish' => "http://www.fabfurnish.com/feed/feed/productstock/id/7438ff7a3f4346db2f41d5cf6ca89cf31a44b347/"
    );

    public function run($args) {
        $x=new Feed;
        return 0;
        $this->_read();
        return 0;
    }

    protected function _read() {
        $this->_fabfurnisFeed();
    }

    protected function _fabfurnisFeed() {
        
        $products = new SimpleXMLElement(self::$_feedURL['fabfurnish'], NULL, TRUE);
        foreach ($products->product as $product) {
            $model = new Feed;
            $product = get_object_vars($product);
            $fields = array(
                'sku' => isset($product['sku']) ? $product['sku'] : '',
                'title' => isset($product['title']) ? $product['title'] : '',
                'short_description' => isset($product['short-description']) ? $product['short-description'] : '',
                'description' => isset($product['description']) ? $product['description'] : '',
                'price' => isset($product['price']) ? $product['price'] : '',
                'special_price' => isset($product['special-price']) ? $product['special-price'] : '',
                'link' => isset($product['link']) ? $product['link'] : '',
                'image' => isset($product['image']) ? $product['image'] : '',
                'date_entered' => date('Y-m-d H:i:s'),
                'date_modified' => date('Y-m-d H:i:s'),
            );
            $data = array(
                'data' => json_encode($fields),
                'status' => 0
            );
            
            $model->setAttributes($data);
            $model->save(false);
        }
    }

}
