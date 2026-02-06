<?php
/**
 * Product Table by WBW - BaseObjectWtbp Class
 *
 * @author  woobewoo
 */

defined( 'ABSPATH' ) || exit;

abstract class BaseObjectWtbp {

	/**
	 * _internalErrors.
	 */
	protected $_internalErrors = array();

	/**
	 * _haveErrors.
	 */
	protected $_haveErrors = false;

	/**
	 * pushError.
	 */
	public function pushError( $error, $key = '' ) {
		if (is_array($error)) {
			$this->_internalErrors = array_merge ($this->_internalErrors, $error);
		} elseif (empty($key)) {
			$this->_internalErrors[] = $error;
		} else {
			$this->_internalErrors[ $key ] = $error;
		}
		$this->_haveErrors = true;
	}

	/**
	 * getErrors.
	 */
	public function getErrors() {
		return $this->_internalErrors;
	}

	/**
	 * haveErrors.
	 */
	public function haveErrors() {
		return $this->_haveErrors;
	}

}
