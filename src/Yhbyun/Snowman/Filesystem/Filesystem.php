<?php namespace Yhbyun\Snowman\Filesystem;

class Filesystem {

	/**
	 * Make a file
	 *
	 * @param $file
	 * @param $content
	 * @param $force
	 * @throws FileAlreadyExists
	 * @return int
	 */
	public function make($file, $content, $force = false) {
		if ( ! $force && $this->exists($file)) {
			throw new FileAlreadyExists;
		}

		return file_put_contents($file, $content);
	}

	/**
	 * Determine if file exists
	 *
	 * @param $file
	 * @return bool
	 */
	public function exists($file) {
		return file_exists($file);
	}

	/**
	 * Fetch the contents of a file
	 *
	 * @param $file
	 * @throws FileNotFound
	 * @return string
	 */
	public function get($file) {
		if ( ! $this->exists($file)) {
			throw new FileNotFound($file);
		}

		return file_get_contents($file);
	}

	public function mkdir($path) {
		if ($this->exists($path)) {
			throw new FileAlreadyExists;
		}

		if ( ! mkdir($path, 0755)) {
			throw new FolderError;
		}
	}

}
