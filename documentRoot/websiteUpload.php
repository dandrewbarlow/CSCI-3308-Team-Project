<?php
//If not coming from submit page:
//	report error, exit
//
//get file name
//get file tmpName
//get file type
//get file size
//
//if type is not an allowable type:
//	exit, report error
//
//if size > MAXFILESIZE:
//	exit, report error
//
//Upload file to new directory
//while checksum fails:
//	Upload file to new directory
//	counter++
//	if counter > maxTries
//		exit, report error
?>
