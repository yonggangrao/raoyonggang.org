<?php
	require_once  MODEL_PATH . 'article.php';

	class indexController extends controller
	{
		public function indexAction()
		{
			
			$action = get_response('action');
			switch ($action)
			{
				case 'list':
					
					
					$start = get_response('start');
					$limit = CONFIGURE::ARTICLE_LIST_NO;
					
					$article_model = new article_model();
					$class_list = $article_model->get_all_list($start, $limit);
					$data['ret'] = $class_list;
					$data['errno'] = $article_model->get_errno();
					$data['msg'] = $article_model->get_msg();
					
					echo json_encode($data);
					
					break;
					
				default:
					
					$start = 0;
					$limit = CONFIGURE::ARTICLE_LIST_NO;
					
					$article_model = new article_model();
					$class_list = $article_model->get_all_list($start, $limit);
					$data['ret'] = $class_list;
					$data['errno'] = $article_model->get_errno();
					$data['msg'] = $article_model->get_msg();
					
					$this->render('index', 'index', $data);
			}
		}
		
	}