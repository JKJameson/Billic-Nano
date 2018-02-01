<?php
class Nano {
	public $settings = array(
		'description' => 'Accept payments via Nano.',
	);
	
	function payment_button($params) {
	    global $billic, $db;
	    if (get_config('Nano_rpc_ip')=='') {
			return false;
	    }
	    return 'Pay using Nano';
	}
	
	function payment_features() {
		return '<img src="data:image/png;base64,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">';	
	}
	
	private $ch;
	function rpc($array) {
		if ($this->ch===null) {
			$this->ch = curl_init();
			curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($this->ch, CURLOPT_HEADER, false);
			curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false); 
			curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, true); 
			curl_setopt($this->ch, CURLOPT_URL, 'http://'.get_config('Nano_rpc_ip').':'.get_config('Nano_rpc_port').'/');
			curl_setopt($this->ch, CURLOPT_POST, true); 
		}
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, json_encode($array)); 
		$data = curl_exec($this->ch);
		$data = trim($data);
		$data = @json_decode($data, true);
		return $data;
	}
	
	function payment_page($params) {
		global $billic, $db;
		if (get_config('Nano_rpc_ip')=='') {
			return 'Nano is not enabled';
		}
		$html = '';
		if ($billic->user['verified']==0 && get_config('Nano_require_verification')==1) {
			return 'verify';
		} else {
			
			$account = $db->q('SELECT * FROM `Nano_accounts` WHERE `invoice_id` = ?', $params['invoice']['id']);
			$account = $account[0];
			if (empty($account)) {
			
				$exchange = get_config('Nano_rate_source');
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
				switch($exchange) {
					/*case 'cryptocompare.com':
					default:
						curl_setopt($ch, CURLOPT_URL, 'https://min-api.cryptocompare.com/data/price?fsym=XRB&tsyms='.get_config('billic_currency_code'));
						$rate = curl_exec($ch);
						$rate = trim($rate);
						$rate = @json_decode($rate, true);
						$rate = $rate[get_config('billic_currency_code')];
						break;
						*/
					case 'coinmarketcap.com':
					default:
						curl_setopt($ch, CURLOPT_URL, 'https://api.coinmarketcap.com/v1/ticker/RaiBlocks/?convert='.get_config('billic_currency_code'));
						$rate = curl_exec($ch);
						$rate = trim($rate);
						$rate = @json_decode($rate, true);
						$rate = $rate[0]['price_'.strtolower(get_config('billic_currency_code'))];
						break;
				}
				$xrb = round((1/$rate) * $params['charge'], 18);
				if (!$xrb || !is_numeric($xrb) || $xrb<=0) {
					err('Failed to get Nano exchange rate. Please try again later. If the problem persists please contact support.');
				}
				
				$markup = get_config('nano_markup');
				if (!empty($markup)) {
					$xrb = round($xrb + (($xrb/100) * get_config('Nano_markup')), 18);
				}
				
				$account = $db->q('SELECT * FROM `Nano_accounts` WHERE `invoice_assigned` IS NULL');
				$account = $account[0];
				if (empty($account)) {				
					$data = $this->rpc([
						'action' => 'account_create',
						'wallet' => get_config('Nano_wallet'),
					]);
					$address = $data['account'];
					if (substr($address, 0, 4)!='xrb_') {
						err('Failed to generate a new Nano address! Please contact support');
					}
					$db->q('INSERT INTO `Nano_accounts` (`created`,`address`) VALUES (NOW(),?)', $address);
				}
				
				$db->q('UPDATE `Nano_accounts` SET `invoice_id` = ?, `invoice_assigned` = NOW(), `invoice_expected_xrb` = ?, `invoice_charge_amt` = ? WHERE `invoice_assigned` IS NULL LIMIT 1', $params['invoice']['id'], $xrb, $params['charge']);
				$account = $db->q('SELECT * FROM `Nano_accounts` WHERE `invoice_id` = ?', $params['invoice']['id']);
				$account = $account[0];
				
				$html .= $this->payment_words($account, $xrb, $account['address']);
			} else {
				$db->q('UPDATE `Nano_accounts` SET `invoice_assigned` = NOW() WHERE `invoice_id` = ?', $params['invoice']['id']);
				$html .= $this->payment_words($account, $account['invoice_expected_xrb'], $account['address']);
			}
			
		}
		return $html;
	}
	
	function payment_words($account, $xrb, $address) {
		$ret = '<br>';
		$paid = $this->currentPaidVal($account);
		if ($paid>0.000001) {
			$ret .= '<div class="alert alert-info" role="alert">Thanks, we\'ve received '.$this->beautify($paid).' XRB so far.</div> <div class="alert alert-warning" role="alert">Please send the balance of '.$this->beautify(($account['invoice_expected_xrb'] - $paid)).' XRB to complete payment.</div>';	
		}
		$ret .= 'Please send <b>'.$this->beautify($xrb).'</b> XRB to <b>'.$address.'</b>';
		$date = new DateTime($account['invoice_assigned']);
		$date->add(new DateInterval('PT'.$this->recycleTime().'H'));
		$ret .= '<br><p>Any payment sent after '.$date->format(DateTime::RSS).' will be lost. <a href="'.$_SERVER['REQUEST_URI'].'">Click here</a> to extend this deadline.</p>';
		//$ret .= '<br><br><img src="http://chart.apis.google.com/chart?chs=300x300&cht=qr&chl='.urlencode('nano:'.$address.'?value='.$xrb).'&choe=UTF-8&chld=H|0">';
		return $ret;
	}
	
	function recycleTime() {
		$hours = ceil(get_config('Nano_recycle_address_hours'));
		if ($hours>0 && $hours<48) {
			return $hours;
		}
		return 2;
	}
	
	function currentPaidVal($account) {
		return $this->beautify((0 - $account['balance_last']) + $account['balance_latest']);
	}
	
	function recycle($account) {
		global $billic, $db;
		$db->q('UPDATE `Nano_accounts` SET `invoice_id` = NULL, `invoice_assigned` = NULL, `invoice_expected_xrb` = NULL, `invoice_charge_amt` = NULL, `balance_last` = `balance_latest` WHERE `address` = ?', $account['address']);
	}
	
	function payment_callback() {
		global $billic, $db;
	}
	
	function beautify($xrb) {
		$ret = rtrim(sprintf('%.18f', $xrb), '0');
		if (substr($ret, -1)=='.')
			$ret = substr($ret, 0, -1);
		return $ret;
	}
	
	function cron() {
		global $billic, $db;
		$accounts = $db->q('SELECT * FROM `Nano_accounts` WHERE `invoice_assigned` IS NOT NULL');
		foreach($accounts as $account) {
			$data = $this->rpc([
				'action' => 'account_balance',
				'account' => $account['address'],
			]);
			$bal = $data['balance'];
			$bal = sprintf('%.18f', $bal / pow(10, 24));
			
			$db->q('UPDATE `Nano_accounts` SET `balance_latest` = ? WHERE `address` = ?', $bal, $account['address']);
			$paid = $this->currentPaidVal($account);
			if ($paid>=(($account['invoice_expected_xrb'] / 100) * (100 - get_config('Nano_loss_percent')))) {
				$this->recycle($account);
				$now = new DateTime();
				$billic->module('Invoices');
				$billic->modules['Invoices']->addpayment(array(
					'gateway' => 'Nano',
					'invoiceid' => $account['invoice_id'],
					'amount' => $account['invoice_charge_amt'],
					'currency' => get_config('billic_currency_code'),
					'transactionid' => $account['address'].' '.$now->format(DateTime::ISO8601),
				));
			}
			
			$now = new DateTime();
			$date = new DateTime($account['invoice_assigned']);
			$date->add(new DateInterval('PT'.$this->recycleTime().'H'));
			if ($now > $date) {
				$this->recycle($account);
			}
		}
	}
	
	function settings($array) {
		global $billic, $db;
		if (empty($_POST['update'])) {
			echo '<form method="POST"><input type="hidden" name="billic_ajax_module" value="Nano"><table class="table table-striped">';
			echo '<tr><th>Setting</th><th>Value</th></tr>';
			echo '<tr><td>Require Verification</td><td><input type="checkbox" name="Nano_require_verification" value="1"'.(get_config('Nano_require_verification')==1?' checked':'').'></td></tr>';
			echo '<tr><td>RPC IP</td><td><input type="text" class="form-control" name="Nano_rpc_ip" value="'.safe(get_config('Nano_rpc_ip')).'"></td></tr>';
			echo '<tr><td>RPC Port</td><td><input type="text" class="form-control" name="Nano_rpc_port" value="'.safe(get_config('Nano_rpc_port')).'"></td></tr>';		
			echo '<tr><td>Nano Wallet</td><td><input type="text" class="form-control" name="Nano_wallet" value="'.safe(get_config('Nano_wallet')).'"></td></tr>';
			echo '<tr><td>Exchange Rate</td><td><select class="form-control" name="Nano_rate_source"><option value="coinmarketcap.com"'.(get_config('Nano_rate_source')=='coinmarketcap.com'?' selected':'').'>coinmarketcap.com</option></select></td></tr>';
			echo '<tr><td>Exchange Rate Markup</td><td><div class="input-group" style="width: 150px"><input type="text" class="form-control" name="Nano_markup" value="'.safe(get_config('Nano_markup')).'"><div class="input-group-addon">%</div></div><sup>This should be between 0% and 100%</sup></td></tr>';
			echo '<tr><td>Allow Missing Payment</td><td><div class="input-group" style="width: 150px"><input type="text" class="form-control" name="Nano_loss_percent" value="'.safe(get_config('Nano_loss_percent')).'"><div class="input-group-addon">%</div></div><sup>This should be between 0% and 100%. Allows a short payment to be applied (rounding errors, fees taken by third parties while sending the payment, etc)</sup></td></tr>';
			echo '<tr><td>Recycle Address Time</td><td><div class="input-group" style="width: 150px"><input type="text" class="form-control" name="Nano_recycle_address_hours" value="'.safe(get_config('Nano_recycle_address_hours')).'"><div class="input-group-addon">hours</div></div><sup>An address will be recycled to a different invoice after X hours of not being paid. This can be extended by the customer. Default 2 hours.</sup></td></tr>';
			echo '<tr><td colspan="2" align="center"><input type="submit" class="btn btn-default" name="update" value="Update &raquo;"></td></tr>';
			echo '</table></form>';
			
			
			echo '<table class="table table-striped">';
			echo '<tr><th>Address</th><th>Balance</th><th>Invoice</th><th>Payment</th><th>Assigned</th></tr>';
			$accounts = $db->q('SELECT * FROM `Nano_accounts`');
			foreach($accounts as $account) {
				echo '<tr><td><a href="https://raiblocks.net/block/index.php?h='.$account['address'].'" target="_new">'.$account['address'].'</a></td><td>'.$this->beautify($account['balance_last']).' XRB</td><td>'.($account['invoice_id']===NULL?'N/A':'<a href="/Admin/Invoices/ID/'.$account['invoice_id'].'/" target="_new">#'.$account['invoice_id'].'</a>').'</td><td>'.$this->currentPaidVal($account).' XRB</td><td>'.($account['invoice_assigned']===NULL?'N/A':$account['invoice_assigned']).'</td></tr>';
			}
			echo '</table></form>';
			
			$data = $this->rpc([
				'action' => 'wallet_balance_total',
				'wallet' => get_config('Nano_wallet'),
			]);
			if(isset($data['balance'])) {
				echo '<div class="alert alert-success" role="alert">RPC connection test successful.</div>';
			} else {
				echo '<div class="alert alert-danger" role="alert">RPC connection test failed! Check RPC Host and Port.</div>';	
			}
			
		} else {
			if (empty($billic->errors)) {
				set_config('Nano_require_verification', $_POST['Nano_require_verification']);
				set_config('Nano_rpc_ip', $_POST['Nano_rpc_ip']);
				set_config('Nano_rpc_port', $_POST['Nano_rpc_port']);
				set_config('Nano_wallet', $_POST['Nano_wallet']);
				set_config('Nano_rate_source', $_POST['Nano_rate_source']);
				set_config('Nano_markup', $_POST['Nano_markup']);
				set_config('Nano_loss_percent', $_POST['Nano_loss_percent']);
				set_config('Nano_recycle_address_hours', $_POST['Nano_recycle_address_hours']);
				$billic->status = 'updated';
			}	
		}
	}
}
