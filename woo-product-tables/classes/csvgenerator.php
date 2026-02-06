<?php
/**
 * Product Table by WBW - CsvgeneratorWtbp Class
 *
 * @author  woobewoo
 */

defined( 'ABSPATH' ) || exit;

class CsvgeneratorWtbp {

	/**
	 * _filename.
	 */
	protected $_filename = '';

	/**
	 * _delimiter.
	 */
	protected $_delimiter = ';';

	/**
	 * _enclosure.
	 */
	protected $_enclosure = "\n";

	/**
	 * _data.
	 */
	protected $_data = array();

	/**
	 * _escape.
	 */
	protected $_escape = '\\';

	/**
	 * Constructor.
	 */
	public function __construct( $filename ) {
		$this->_filename = $filename;
	}

	/**
	 * addCell.
	 */
	public function addCell( $x, $y, $value ) {
		$this->_data[ $x ][ $y ] = '"' . $value . '"'; // If will not do "" then symbol for example, will broke file
	}

	/**
	 * generate.
	 */
	public function generate() {
		$strData = '';
		if (!empty($this->_data)) {
			$rows = array();
			foreach ($this->_data as $cells) {
				$rows[] = implode($this->_delimiter, $cells);
			}
			$strData = implode($this->_enclosure, $rows);
		}
		FilegeneratorWtbp::_($this->_filename, $strData, 'csv')->generate();
	}

	/**
	 * getDelimiter.
	 */
	public function getDelimiter() {
		return $this->_delimiter;
	}

	/**
	 * getEnclosure.
	 */
	public function getEnclosure() {
		return $this->_enclosure;
	}

	/**
	 * getEscape.
	 */
	public function getEscape() {
		return $this->_escape;
	}

}
