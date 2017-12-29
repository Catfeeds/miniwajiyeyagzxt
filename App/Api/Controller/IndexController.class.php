<?php
namespace Api\Controller;
use Think\Controller;
class IndexController extends PublicController {
	//***************************
	//  首页数据接口
	//***************************
    public function index(){
    	//如果缓存首页没有数据，那么就读取数据库
    	/***********获取首页顶部轮播图************/
    	$ggtop=M('guanggao')->order('sort desc,id asc')->field('id,name,photo,type,action')->limit(10)->select();
		foreach ($ggtop as $k => $v) {
			$ggtop[$k]['photo']=__DATAURL__.$v['photo'];
			$ggtop[$k]['name']=urlencode($v['name']);
		}
    	/***********获取首页顶部轮播图 end************/

    	//======================
    	//首页推荐分类前八个
    	//======================
    	$procat = M('category')->where('bz_2=1 AND tid!=0')->order('bz_2 desc,sort desc')->field('id,name,bz_1')->limit(8)->select();
    	foreach ($procat as $k => $v) {
    		$procat[$k]['bz_1'] = __DATAURL__.$v['bz_1'];
    	}

        //======================
        //首页推荐购物券
        //======================
        // $time = time();
        // $shop = M('voucher')->where('del=0 AND end_time>"'.$time.'"')->select();
        // foreach($shop as $k => $v){
        //     $shop[$k]['cate_name'] = M('category')->where('id="'.$v['cate_id'].'"')->getField('name');
        // }

        //======================
        //首页小图标
        //======================
        // $tubiao = array();
        // $tubiao['ka'] = __PUBLICURL__.'home/images/ka.png';
        // $tubiao['qi'] = __PUBLICURL__.'home/images/qi.png';
        // $tubiao['ping'] = __PUBLICURL__.'home/images/ping.png';

        //======================
        //首页推荐人气商品
        //======================
        $list1 = M('product')->where('del=0 AND pro_type=1 AND is_down=0 AND type=1 AND cid=3')->limit(4)->select();
        foreach($list1 as $k => $v){
             $list1[$k]['photo_x'] =  __DATAURL__.M('attr_spec_price_store')->where('pid="'.$v['id'].'"')->getField('photo_x');
             $tag_id = M('attr_spec_price_store')->where('pid="'.$v['id'].'"')->getField('tag_id');
             $list1[$k]['tag'] = M('tag')->where('id="'.$tag_id.'"')->getField('name');
             $list1[$k]['price'] = M('attr_spec_price_store')->where('pid="'.$v['id'].'"')->getField('price_yh');
             $list1[$k]['photo_d'] = M('attr_spec_price_store')->where('pid="'.$v['id'].'"')->getField('photo_d');
             $list1[$k]['photo_d'] = __DATAURL__.$list1[$k]['photo_d'];
             $list1[$k]['ping'] = M('product_dp')->where('pid="'.$v['id'].'"')->count();
        }

        $list2 = M('product')->where('del=0 AND pro_type=1 AND is_down=0 AND type=1 AND cid=4')->limit(4)->select();
        foreach($list2 as $k => $v){
             $list2[$k]['photo_x'] =  __DATAURL__.M('attr_spec_price_store')->where('pid="'.$v['id'].'"')->getField('photo_x');
             $tag_id = M('attr_spec_price_store')->where('pid="'.$v['id'].'"')->getField('tag_id');
             $list2[$k]['tag'] = M('tag')->where('id="'.$tag_id.'"')->getField('name');
             $list2[$k]['price'] = M('attr_spec_price_store')->where('pid="'.$v['id'].'"')->getField('price_yh');
             $list2[$k]['photo_d'] = M('attr_spec_price_store')->where('pid="'.$v['id'].'"')->getField('photo_d');
             $list2[$k]['photo_d'] = __DATAURL__.$list2[$k]['photo_d'];
             $list2[$k]['ping'] = M('product_dp')->where('pid="'.$v['id'].'"')->count();
        }

        $list3 = M('product')->where('del=0 AND pro_type=1 AND is_down=0 AND type=1 AND cid=5')->limit(4)->select();
        foreach($list3 as $k => $v){
             $list3[$k]['photo_x'] =  __DATAURL__.M('attr_spec_price_store')->where('pid="'.$v['id'].'"')->getField('photo_x');
             $tag_id = M('attr_spec_price_store')->where('pid="'.$v['id'].'"')->getField('tag_id');
             $list3[$k]['tag'] = M('tag')->where('id="'.$tag_id.'"')->getField('name');
             $list3[$k]['price'] = M('attr_spec_price_store')->where('pid="'.$v['id'].'"')->getField('price_yh');
             $list3[$k]['photo_d'] = M('attr_spec_price_store')->where('pid="'.$v['id'].'"')->getField('photo_d');
             $list3[$k]['photo_d'] = __DATAURL__.$list3[$k]['photo_d'];
             $list3[$k]['ping'] = M('product_dp')->where('pid="'.$v['id'].'"')->count();
        }

        //======================
        //首页推荐品牌六个
        //======================
        // $brand = M('brand')->where('type=1')->field('id,name,photo')->select();
        // foreach ($brand as $k => $v) {
        //     $brand[$k]['photo'] = __DATAURL__.$v['photo'];
        // }

    	$renqi = M('product')->where('del=0 AND pro_type=1 AND is_down=0 AND type=1')->select();
        foreach($renqi as $k => $v){
             $renqi[$k]['photo_x'] =  __DATAURL__.M('attr_spec_price_store')->where('pid="'.$v['id'].'"')->getField('photo_x');
             $tag_id = M('attr_spec_price_store')->where('pid="'.$v['id'].'"')->getField('tag_id');
             $renqi[$k]['tag'] = M('tag')->where('id="'.$tag_id.'"')->getField('name');
             $renqi[$k]['price'] = M('attr_spec_price_store')->where('pid="'.$v['id'].'"')->getField('price_yh');
             $renqi[$k]['photo_d'] = M('attr_spec_price_store')->where('pid="'.$v['id'].'"')->getField('photo_d');
             $renqi[$k]['photo_d'] = __DATAURL__.$renqi[$k]['photo_d'];
             $renqi[$k]['ping'] = M('product_dp')->where('pid="'.$v['id'].'"')->count();
        }

        $buy = M('supply')->where('type=2')->select();
        foreach ($buy as $k => $v) {
            $buy[$k]['photo'] = __DATAURL__.$v['photo'];
            $buy[$k]['addtime'] = date('Y-m-d',$v['addtime']);
        }

        $sale = M('supply')->where('type=1')->select();
        foreach ($sale as $k => $v) {
            $sale[$k]['photo'] = __DATAURL__.$v['photo'];
            $sale[$k]['addtime'] = date('Y-m-d',$v['addtime']);
        }

        $news = M('news')->order('sort desc,id desc')->select();
        foreach($news as $k => $v){
            $news[$k]['photo'] = __DATAURL__.$v['photo'];
            $news[$k]['addtime'] = date('Y-m-d',$v['addtime']);
        }

        $cname1 = M('category')->where('id=3')->getField('name');
        $cname2 = M('category')->where('id=4')->getField('name');
        $cname3 = M('category')->where('id=5')->getField('name');

    	echo json_encode(array('ggtop'=>$ggtop,'list1'=>$list1,'list2'=>$list2,'list3'=>$list3,'renqi'=>$renqi,'sale'=>$sale,'buy'=>$buy,'news'=>$news,'cname1'=>$cname1,'cname2'=>$cname2,'cname3'=>$cname3));
    	exit();
    }
    /**
     * [getlist 加载更多]
     * @return [type] [description]
     */
    public function getlist(){
        $page = intval($_REQUEST['page']);
        $limit = intval($page*8)-8;

        $pro_list = M('product')->where('del=0 AND pro_type=1 AND is_down=0 AND type=1')->order('sort desc,id desc')->field('id,name,photo_x,price_yh,shiyong')->limit($limit.',8')->select();
        foreach ($pro_list as $k => $v) {
            $pro_list[$k]['photo_x'] = __DATAURL__.M('attr_spec_price_store')->where('pid="'.$v['id'].'"')->getField('photo_x');
        }

        echo json_encode(array('prolist'=>$pro_list));
        exit();
    }


}
