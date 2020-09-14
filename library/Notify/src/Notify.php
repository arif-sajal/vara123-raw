<?php

namespace Library\Notify;

class Notify
{
    private $status;

	private $message;

	private $callback;

	private $reload;

	private $response;

	public function send($status,$message){
		$this->status = $status;
		$this->message = $message;

		$this->response['status'] = $this->status;
		$this->response['message'] = $this->message;

		return $this;
	}

	public function callback(array $callbacks){
		if(count($callbacks) > 0):
			foreach($callbacks as $key => $value):
                $this->callback[] = ['function'=>$key,'arg'=>$value];
				$this->response['callback'][] = ['function'=>$key,'arg'=>$value];
			endforeach;
		endif;
		return $this;
	}

	public function reload($type,$reload){
		if(is_array($reload)):
			if(count($reload) < 1):
				$this->reload[$type] = $this->response['reload'][$type] = "all";
			elseif(count($reload) > 0 && count($reload) === 1):
				$this->reload[$type][] = $this->response['reload'][$type][] = ['section'=>$reload['section']];
			elseif(count($reload) > 1):
				foreach($reload as $key => $value):
					$this->reload[$type][] = $this->response['reload'][$type][] = ['section'=>$value];
				endforeach;
			endif;
		else:
			if(strtoupper($reload) === "ALL"):
				$this->reload[$type] = $this->response['reload'][$type] = "all";
			else:
				$this->reload[$type][] = $this->response['reload'][$type][] = ['section'=>$reload];
			endif;
		endif;
		return $this;
	}

	public function json(){
		return response()->json($this->response);
	}

	public function array(){
		return $this->response;
	}
}
