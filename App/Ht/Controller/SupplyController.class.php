<?php
namespace Ht\Controller;
use Think\Controller;
class SupplyController extends PublicController{
	/*
	*
	* 获取、查询新闻表数据
	*/
	public function index(){
		//构建搜索条件
		//分页
		$count   = M('supply')->where('1=1')->count();// 查询满足要求的总记录数
		$Page    = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)

		//头部描述信息，默认值 “共 %TOTAL_ROW% 条记录”
		$Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
		//上一页描述信息
	    $Page->setConfig('prev', '上一页');
	    //下一页描述信息
	    $Page->setConfig('next', '下一页');
	    //首页描述信息
	    $Page->setConfig('first', '首页');
	    //末页描述信息
	    $Page->setConfig('last', '末页');
	    /*
	    * 分页主题描述信息 
	    * %FIRST%  表示第一页的链接显示  
	    * %UP_PAGE%  表示上一页的链接显示   
	    * %LINK_PAGE%  表示分页的链接显示
	    * %DOWN_PAGE% 	表示下一页的链接显示
	    * %END%   表示最后一页的链接显示
	    */
	    $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');

		$show = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = M('supply')->where('1=1')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach ($list as $k => $v) {
			$list[$k]['addtime'] = date("Y-m-d",$v['addtime']);
			if($v['uid']>0){
				$list[$k]['username'] = M('user')->where('id='.intval($v['uid']))->getField('uname');
			}else{
				$list[$k]['username'] = $v['name'];
			}
			
		}

		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板

	}

	/*
	*
	* 新闻删除、新闻评论删除
	*/
	public function del(){
		//以后删除还要加权限登录判断
		$id = intval($_GET['did']);
		$check_info = M('supply')->where('id='.intval($id))->find();
		if (!$check_info) {
			$this->error('非法操作.');
			exit();
		}

		$res = M('supply')->where('id='.intval($id))->delete();
		if ($res) {
			//把对应图片也一起删除
			$this->redirect('index');
		}else{
			$this->error('操作失败.');
		}
	}

	//发布供求
	public function add(){
		$id = intval($_POST['id']);
		if($_POST['submit']==true){
			$data['uid'] = 0;
			$data['type'] = intval($_POST['type']);
			$data['name'] = $_POST['name'];
			$data['phone'] = $_POST['tel'];
			$data['content'] = $_POST['content'];
			// $data['addtime'] = time();
			//上传产品小图
			if (!empty($_FILES["photo"]["tmp_name"])) {
					//文件上传
					$info = $this->upload_images($_FILES["photo"],array('jpg','png','jpeg'),"supply/".date(Ymd));
				    if(!is_array($info)) {// 上传错误提示错误信息
				        $this->error($info);
				        exit();
				    }else{// 上传成功 获取上传文件信息
					    $data['photo'] = 'UploadFiles/'.$info['savepath'].$info['savename'];
					    // $xt = M('supply')->where('id='.intval($id))->field('photo_x')->find();
					  //   if ($id && $xt['photo_x']) {
					  //   	$img_url = "Data/".$xt['photo_x'];
							// if(file_exists($img_url)) {
							// 	@unlink($img_url);
							// }
					  //   }
				    }
			}
			if($id){
				$res = M('supply')->where('id='.$id)->save($data);
			}else{
				$data['addtime'] = time();
				$res = M('supply')->add($data);
			}
			
			if($res){
				$this->success('操作成功！','index');
			}else{
				$this->error('操作失败！');
			}
			exit();
		}
		$this->display();
	}

	public function update(){
		$id = intval($_GET['id']);
		$info = M('supply')->where('id='.$id)->find();
		if(!$info){
			$this->error('发布失败！');
		}else{
			$this->assign('info',$info);
			$this->display('add');
		}
	}
}