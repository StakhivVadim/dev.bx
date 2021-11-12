<?php

function printMessage(string $message)
{
	echo $message;
}

function getFileName($path): string
{
	return basename($path, ".php");
}
