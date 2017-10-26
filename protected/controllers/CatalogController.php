<?php

class CatalogController extends Controller
{
    public function actionIndex($id = '')
    {
        if ($id) {
            $o_chapter = Chapter::model()->findByAttributes(array('url' => $id));
            if (!$o_chapter) {
                $this->redirect(array('index'));
            }
        } else {
            $o_chapter = '';
        }
        $a_chapter = Chapter::model()->findAllByAttributes(array('status' => 1), array('order' => '`order` ASC'));
        $a_filter = Filter::model()->findAllByAttributes(array('status' => 1), array('order' => '`order` ASC'));
        $page = Yii::app()->request->getQuery('page', 1);
        $offset = ($page - 1) * Product::ON_PAGE;
        if (Yii::app()->request->getQuery('filter')) {
            $a_productfilter = ProductFilter::model()->findAllByAttributes(
                array('filter_id' => Yii::app()->request->getQuery('filter'))
            );
            $product_id = array();
            foreach ($a_productfilter as $item) {
                $product_id[] = $item['product_id'];
            }
            if ($o_chapter) {
                $a_category = Category::model()->findAllByAttributes(array('chapter_id' => $o_chapter['id']));
                $category = array();
                foreach ($a_category as $item) {
                    $category[] = $item['id'];
                }
                $a_product = Product::model()->findAllByAttributes(
                    array('status' => 1, 'id' => $product_id, 'category_id' => $category),
                    array('order' => 'id ASC', 'offset' => $offset, 'limit' => News::ON_PAGE)
                );
                $count = Product::model()->countByAttributes(
                    array('status' => 1, 'id' => $product_id, 'category_id' => $category)
                );
            } else {
                $a_product = Product::model()->findAllByAttributes(
                    array('status' => 1, 'id' => $product_id),
                    array('order' => 'id ASC', 'offset' => $offset, 'limit' => News::ON_PAGE)
                );
                $count = Product::model()->countByAttributes(array('status' => 1, 'id' => $product_id));
            }
        } else {
            if ($o_chapter) {
                $a_category = Category::model()->findAllByAttributes(array('chapter_id' => $o_chapter['id']));
                $category = array();
                foreach ($a_category as $item) {
                    $category[] = $item['id'];
                }
                $a_product = Product::model()->findAllByAttributes(
                    array('status' => 1, 'category_id' => $category),
                    array('order' => 'id ASC', 'offset' => $offset, 'limit' => News::ON_PAGE)
                );
                $count = Product::model()->countByAttributes(array('status' => 1, 'category_id' => $category));
            } else {
                $a_product = Product::model()->findAllByAttributes(
                    array('status' => 1),
                    array('order' => 'id ASC', 'offset' => $offset, 'limit' => News::ON_PAGE)
                );
                $count = Product::model()->countByAttributes(array('status' => 1));
            }
        }
        $more = false;
        if ($count > count($a_product) + $offset) {
            $more = true;
        }
        $page_total = ceil($count / News::ON_PAGE);
        $page_first = $page - 4;
        if ($page_first < 1) {
            $page_first = 1;
        }
        $page_last = $page + 4;
        if ($page_last > $page_total) {
            $page_last = $page_total;
        }
        $page_prev = $page - 1;
        if ($page_prev < 1) {
            $page_prev = 0;
        }
        $page_next = $page + 1;
        if ($page_next > $page_total) {
            $page_next = 0;
        }
        $o_page = PageCatalog::model()->findByPk(1);
        $this->setSEO($o_page);
        if ($id) {
            $this->breadcrumbs = array(
                $o_page['h1_' . Yii::app()->language] => array('index'),
                $o_chapter['h1_' . Yii::app()->language],
            );
        } else {
            $this->breadcrumbs = array(
                $o_page['h1_' . Yii::app()->language],
            );
        }
        $this->render('index', array(
            'a_chapter' => $a_chapter,
            'a_filter' => $a_filter,
            'a_product' => $a_product,
            'more' => $more,
            'o_chapter' => $o_chapter,
            'o_page' => $o_page,
            'offset' => $offset,
            'page' => $page,
            'page_first' => $page_first,
            'page_last' => $page_last,
            'page_next' => $page_next,
            'page_prev' => $page_prev,
        ));
    }

    public function actionMore()
    {
        if (Yii::app()->request->getQuery('id')) {
            $o_chapter = Chapter::model()->findByAttributes(array('url' => Yii::app()->request->getQuery('id')));
            if (!$o_chapter) {
                $o_chapter = '';
            }
        } else {
            $o_chapter = '';
        }
        if (Yii::app()->request->getQuery('filter')) {
            $filter = explode(',', Yii::app()->request->getQuery('filter'));
            $a_productfilter = ProductFilter::model()->findAllByAttributes(array('filter_id' => $filter));
            $product_id = array();
            foreach ($a_productfilter as $item) {
                $product_id[] = $item['product_id'];
            }
            if ($o_chapter) {
                $a_category = Category::model()->findAllByAttributes(array('chapter_id' => $o_chapter['id']));
                $category = array();
                foreach ($a_category as $item) {
                    $category[] = $item['id'];
                }
                $a_product = Product::model()->findAllByAttributes(
                    array('status' => 1, 'id' => $product_id, 'category_id' => $category),
                    array(
                        'order' => 'id ASC',
                        'offset' => Yii::app()->request->getQuery('offset', 0) + Product::ON_PAGE,
                        'limit' => Product::ON_PAGE
                    )
                );
            } else {
                $a_product = Product::model()->findAllByAttributes(
                    array('status' => 1, 'id' => $product_id),
                    array(
                        'order' => 'id ASC',
                        'offset' => Yii::app()->request->getQuery('offset', 0) + Product::ON_PAGE,
                        'limit' => Product::ON_PAGE
                    )
                );
            }
        } else {
            if ($o_chapter) {
                $a_category = Category::model()->findAllByAttributes(array('chapter_id' => $o_chapter['id']));
                $category = array();
                foreach ($a_category as $item) {
                    $category[] = $item['id'];
                }
                $a_product = Product::model()->findAllByAttributes(
                    array('status' => 1, 'category_id' => $category),
                    array(
                        'order' => 'id ASC',
                        'offset' => Yii::app()->request->getQuery('offset', 0) + Product::ON_PAGE,
                        'limit' => Product::ON_PAGE
                    )
                );
            } else {
                $a_product = Product::model()->findAllByAttributes(
                    array('status' => 1),
                    array(
                        'order' => 'id ASC',
                        'offset' => Yii::app()->request->getQuery('offset', 0) + Product::ON_PAGE,
                        'limit' => Product::ON_PAGE
                    )
                );
            }
        }
        foreach ($a_product as $item) {
            $this->renderPartial('item', array('item' => $item));
        }
    }

    public function actionCheck()
    {
        if (Yii::app()->request->getQuery('id')) {
            $o_chapter = Chapter::model()->findByAttributes(array('url' => Yii::app()->request->getQuery('id')));
            if (!$o_chapter) {
                $o_chapter = '';
            }
        } else {
            $o_chapter = '';
        }
        if (Yii::app()->request->getQuery('filter')) {
            $filter = explode(',', Yii::app()->request->getQuery('filter'));
            $a_productfilter = ProductFilter::model()->findAllByAttributes(array('filter_id' => $filter));
            $product_id = array();
            foreach ($a_productfilter as $item) {
                $product_id[] = $item['product_id'];
            }
            if ($o_chapter) {
                $a_category = Category::model()->findAllByAttributes(array('chapter_id' => $o_chapter['id']));
                $category = array();
                foreach ($a_category as $item) {
                    $category[] = $item['id'];
                }
                $count = Product::model()->countByAttributes(
                    array('status' => 1, 'id' => $product_id, 'category_id' => $category)
                );
            } else {
                $count = Product::model()->countByAttributes(array('status' => 1, 'id' => $product_id));
            }
        } else {
            if ($o_chapter) {
                $a_category = Category::model()->findAllByAttributes(array('chapter_id' => $o_chapter['id']));
                $category = array();
                foreach ($a_category as $item) {
                    $category[] = $item['id'];
                }
                $count = Product::model()->countByAttributes(array('status' => 1, 'category_id' => $category));
            } else {
                $count = Product::model()->countByAttributes(array('status' => 1));
            }
        }
        $offset = (int)Yii::app()->request->getQuery('offset', 0) + Product::ON_PAGE;
        $remove = false;
        if ($count <= $offset + Product::ON_PAGE) {
            $remove = true;
        }
        print CJSON::encode(array('remove' => $remove, 'offset' => $offset));
    }
}