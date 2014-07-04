<?php

/*
 * @Author : Nanhe Kumar <nanhe.kumar@fabfurnish.com>
 * Read feed from fabfurnish.com 
 */

class FeedCommand extends CConsoleCommand {

    protected $feedURL = "http://www.fabfurnish.com/feed/feed/productstock/id/7438ff7a3f4346db2f41d5cf6ca89cf31a44b347/";

    public function run($args) {
        $this->read();
        return 0;
    }

    protected function read() {

        $products = new SimpleXMLElement($this->feedURL, NULL, TRUE);
        foreach ($products->product as $product) {
            $product = get_object_vars($product);
            $model =Feed::model()->find('sku=:sku', array('sku' => $product['sku']));
            if(!$model) $model = new Feed;
            $fields = array(
                'sku' => isset($product['sku'])?$product['sku']:'',
                'title' =>isset($product['title'])? $product['title']:'',
                'short_description' =>isset($product['short-description'])? $product['short-description']:'' ,
                'description' =>isset($product['description'])? $product['description']:'',
                'price' =>isset($product['price'])? $product['price']:'',
                'special_price' =>isset($product['special-price'])? $product['special-price']:'' ,
                'link' =>isset($product['link'])? $product['link']:'' ,
                'image' =>isset($product['image'])? $product['image']:'',
                'date_entered' => date('Y-m-d H:i:s'),
                'date_modified' => date('Y-m-d H:i:s'),
            );
            $model->setAttributes($fields);
            $model->save(false);
        }
    }

}
