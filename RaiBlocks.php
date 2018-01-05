<?php
class RaiBlocks {
	public $settings = array(
		'description' => 'Accept payments via RaiBlocks.',
	);
	function payment_button($params) {
		global $billic, $db;
		if (get_config('raiblocks_rpc_ip') == '') {
			return false;
		}
		return 'Pay using RaiBlocks';
	}
	function payment_features() {
		return '<img src="data:image/png;base64,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
">';
	}
	private $ch;
	function rpc($array) {
		if ($this->ch === null) {
			$this->ch = curl_init();
			curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($this->ch, CURLOPT_HEADER, false);
			curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, true);
			curl_setopt($this->ch, CURLOPT_URL, 'http://' . get_config('raiblocks_rpc_ip') . ':' . get_config('raiblocks_rpc_port') . '/');
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
		if (get_config('raiblocks_rpc_ip') == '') {
			return 'RaiBlocks is not enabled';
		}
		$html = '';
		if ($billic->user['verified'] == 0 && get_config('raiblocks_require_verification') == 1) {
			return 'verify';
		} else {
			$account = $db->q('SELECT * FROM `RaiBlocks_accounts` WHERE `invoice_id` = ?', $params['invoice']['id']);
			$account = $account[0];
			if (empty($account)) {
				$exchange = get_config('raiblocks_rate_source');
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
				switch ($exchange) {
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
						curl_setopt($ch, CURLOPT_URL, 'https://api.coinmarketcap.com/v1/ticker/RaiBlocks/?convert=' . get_config('billic_currency_code'));
						$rate = curl_exec($ch);
						$rate = trim($rate);
						$rate = @json_decode($rate, true);
						$rate = $rate[0]['price_' . strtolower(get_config('billic_currency_code')) ];
					break;
				}
				$xrb = round((1 / $rate) * $params['charge'], 18);
				if (!$xrb || !is_numeric($xrb) || $xrb <= 0) {
					err('Failed to get RaiBlocks exchange rate. Please try again later. If the problem persists please contact support.');
				}
				$markup = get_config('raiblocks_markup');
				if (!empty($markup)) {
					$xrb = round($xrb + (($xrb / 100) * get_config('raiblocks_markup')) , 18);
				}
				$account = $db->q('SELECT * FROM `RaiBlocks_accounts` WHERE `invoice_assigned` IS NULL');
				$account = $account[0];
				if (empty($account)) {
					$data = $this->rpc(['action' => 'account_create', 'wallet' => get_config('raiblocks_wallet') , ]);
					$address = $data['account'];
					if (substr($address, 0, 4) != 'xrb_') {
						err('Failed to generate a new RaiBlocks address! Please contact support');
					}
					$db->q('INSERT INTO `RaiBlocks_accounts` (`created`,`address`) VALUES (NOW(),?)', $address);
				}
				$db->q('UPDATE `RaiBlocks_accounts` SET `invoice_id` = ?, `invoice_assigned` = NOW(), `invoice_expected_xrb` = ?, `invoice_charge_amt` = ? WHERE `invoice_assigned` IS NULL LIMIT 1', $params['invoice']['id'], $xrb, $params['charge']);
				$account = $db->q('SELECT * FROM `RaiBlocks_accounts` WHERE `invoice_id` = ?', $params['invoice']['id']);
				$account = $account[0];
				$html.= $this->payment_words($account, $xrb, $account['address']);
			} else {
				$db->q('UPDATE `RaiBlocks_accounts` SET `invoice_assigned` = NOW() WHERE `invoice_id` = ?', $params['invoice']['id']);
				$html.= $this->payment_words($account, $account['invoice_expected_xrb'], $account['address']);
			}
		}
		return $html;
	}
	function payment_words($account, $xrb, $address) {
		$ret = '<br>';
		$paid = $this->currentPaidVal($account);
		if ($paid > 0.000001) {
			$ret.= '<div class="alert alert-info" role="alert">Thanks, we\'ve received ' . $this->beautify($paid) . ' XRB so far.</div> <div class="alert alert-warning" role="alert">Please send the balance of ' . $this->beautify(($account['invoice_expected_xrb'] - $paid)) . ' XRB to complete payment.</div>';
		}
		$ret.= 'Please send <b>' . $this->beautify($xrb) . '</b> XRB to <b>' . $address . '</b>';
		$date = new DateTime($account['invoice_assigned']);
		$date->add(new DateInterval('PT' . $this->recycleTime() . 'H'));
		$ret.= '<br><p>Any payment sent after ' . $date->format(DateTime::RSS) . ' will be lost. <a href="' . $_SERVER['REQUEST_URI'] . '">Click here</a> to extend this deadline.</p>';
		//$ret .= '<br><br><img src="http://chart.apis.google.com/chart?chs=300x300&cht=qr&chl='.urlencode('raiblocks:'.$address.'?value='.$xrb).'&choe=UTF-8&chld=H|0">';
		return $ret;
	}
	function recycleTime() {
		$hours = ceil(get_config('raiblocks_recycle_address_hours'));
		if ($hours > 0 && $hours < 48) {
			return $hours;
		}
		return 2;
	}
	function currentPaidVal($account) {
		return $this->beautify((0 - $account['balance_last']) + $account['balance_latest']);
	}
	function recycle($account) {
		global $billic, $db;
		$db->q('UPDATE `RaiBlocks_accounts` SET `invoice_id` = NULL, `invoice_assigned` = NULL, `invoice_expected_xrb` = NULL, `invoice_charge_amt` = NULL, `balance_last` = `balance_latest` WHERE `address` = ?', $account['address']);
	}
	function payment_callback() {
		global $billic, $db;
	}
	function beautify($xrb) {
		$ret = rtrim(sprintf('%.18f', $xrb) , '0');
		if (substr($ret, -1) == '.') $ret = substr($ret, 0, -1);
		return $ret;
	}
	function cron() {
		global $billic, $db;
		$accounts = $db->q('SELECT * FROM `RaiBlocks_accounts` WHERE `invoice_assigned` IS NOT NULL');
		foreach ($accounts as $account) {
			$data = $this->rpc(['action' => 'account_balance', 'account' => $account['address'], ]);
			$bal = $data['balance'];
			$bal = sprintf('%.18f', $bal / pow(10, 24));
			$db->q('UPDATE `RaiBlocks_accounts` SET `balance_latest` = ? WHERE `address` = ?', $bal, $account['address']);
			$paid = $this->currentPaidVal($account);
			if ($paid >= (($account['invoice_expected_xrb'] / 100) * (100 - get_config('raiblocks_loss_percent')))) {
				$this->recycle($account);
				$now = new DateTime();
				$billic->module('Invoices');
				$billic->modules['Invoices']->addpayment(array(
					'gateway' => 'RaiBlocks',
					'invoiceid' => $account['invoice_id'],
					'amount' => $account['invoice_charge_amt'],
					'currency' => get_config('billic_currency_code') ,
					'transactionid' => $account['address'] . ' ' . $now->format(DateTime::ISO8601) ,
				));
			}
			$now = new DateTime();
			$date = new DateTime($account['invoice_assigned']);
			$date->add(new DateInterval('PT' . $this->recycleTime() . 'H'));
			if ($now > $date) {
				$this->recycle($account);
			}
		}
	}
	function settings($array) {
		global $billic, $db;
		if (empty($_POST['update'])) {
			echo '<form method="POST"><input type="hidden" name="billic_ajax_module" value="RaiBlocks"><table class="table table-striped">';
			echo '<tr><th>Setting</th><th>Value</th></tr>';
			echo '<tr><td>Require Verification</td><td><input type="checkbox" name="raiblocks_require_verification" value="1"' . (get_config('raiblocks_require_verification') == 1 ? ' checked' : '') . '></td></tr>';
			echo '<tr><td>RPC IP</td><td><input type="text" class="form-control" name="raiblocks_rpc_ip" value="' . safe(get_config('raiblocks_rpc_ip')) . '"></td></tr>';
			echo '<tr><td>RPC Port</td><td><input type="text" class="form-control" name="raiblocks_rpc_port" value="' . safe(get_config('raiblocks_rpc_port')) . '"></td></tr>';
			echo '<tr><td>RaiBlocks Wallet</td><td><input type="text" class="form-control" name="raiblocks_wallet" value="' . safe(get_config('raiblocks_wallet')) . '"></td></tr>';
			echo '<tr><td>Exchange Rate</td><td><select class="form-control" name="raiblocks_rate_source"><option value="coinmarketcap.com"' . (get_config('raiblocks_rate_source') == 'coinmarketcap.com' ? ' selected' : '') . '>coinmarketcap.com</option></select></td></tr>';
			echo '<tr><td>Exchange Rate Markup</td><td><div class="input-group" style="width: 150px"><input type="text" class="form-control" name="raiblocks_markup" value="' . safe(get_config('raiblocks_markup')) . '"><div class="input-group-addon">%</div></div><sup>This should be between 0% and 100%</sup></td></tr>';
			echo '<tr><td>Allow Missing Payment</td><td><div class="input-group" style="width: 150px"><input type="text" class="form-control" name="raiblocks_loss_percent" value="' . safe(get_config('raiblocks_loss_percent')) . '"><div class="input-group-addon">%</div></div><sup>This should be between 0% and 100%. Allows a short payment to be applied (rounding errors, fees taken by third parties while sending the payment, etc)</sup></td></tr>';
			echo '<tr><td>Recycle Address Time</td><td><div class="input-group" style="width: 150px"><input type="text" class="form-control" name="raiblocks_recycle_address_hours" value="' . safe(get_config('raiblocks_recycle_address_hours')) . '"><div class="input-group-addon">hours</div></div><sup>An address will be recycled to a different invoice after X hours of not being paid. This can be extended by the customer. Default 2 hours.</sup></td></tr>';
			echo '<tr><td colspan="2" align="center"><input type="submit" class="btn btn-default" name="update" value="Update &raquo;"></td></tr>';
			echo '</table></form>';
			echo '<table class="table table-striped">';
			echo '<tr><th>Address</th><th>Balance</th><th>Invoice</th><th>Payment</th><th>Assigned</th></tr>';
			$accounts = $db->q('SELECT * FROM `RaiBlocks_accounts`');
			foreach ($accounts as $account) {
				echo '<tr><td><a href="https://raiblocks.net/block/index.php?h=' . $account['address'] . '" target="_new">' . $account['address'] . '</a></td><td>' . $this->beautify($account['balance_last']) . ' XRB</td><td>' . ($account['invoice_id'] === NULL ? 'N/A' : '<a href="/Admin/Invoices/ID/' . $account['invoice_id'] . '/" target="_new">#' . $account['invoice_id'] . '</a>') . '</td><td>' . $this->currentPaidVal($account) . ' XRB</td><td>' . ($account['invoice_assigned'] === NULL ? 'N/A' : $account['invoice_assigned']) . '</td></tr>';
			}
			echo '</table></form>';
			$data = $this->rpc(['action' => 'wallet_balance_total', 'wallet' => get_config('raiblocks_wallet') , ]);
			if (isset($data['balance'])) {
				echo '<div class="alert alert-success" role="alert">RPC connection test successful.</div>';
			} else {
				echo '<div class="alert alert-danger" role="alert">RPC connection test failed! Check RPC Host and Port.</div>';
			}
		} else {
			if (empty($billic->errors)) {
				set_config('raiblocks_require_verification', $_POST['raiblocks_require_verification']);
				set_config('raiblocks_rpc_ip', $_POST['raiblocks_rpc_ip']);
				set_config('raiblocks_rpc_port', $_POST['raiblocks_rpc_port']);
				set_config('raiblocks_wallet', $_POST['raiblocks_wallet']);
				set_config('raiblocks_rate_source', $_POST['raiblocks_rate_source']);
				set_config('raiblocks_markup', $_POST['raiblocks_markup']);
				set_config('raiblocks_loss_percent', $_POST['raiblocks_loss_percent']);
				set_config('raiblocks_recycle_address_hours', $_POST['raiblocks_recycle_address_hours']);
				$billic->status = 'updated';
			}
		}
	}
}
