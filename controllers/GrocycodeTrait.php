<?php

namespace Grocy\Controllers;

use Grocy\Helpers\Grocycode;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use jucksearm\barcode\lib\BarcodeFactory;
use jucksearm\barcode\lib\DatamatrixFactory;

trait GrocycodeTrait
{
	public function ServeGrocycodeImage(ServerRequestInterface $request, ResponseInterface $response, Grocycode $grocycode)
	{
		$size = $request->getQueryParam('size', null);

		if (GROCY_GROCYCODE_TYPE == '2D')
		{
			$png = (new DatamatrixFactory())->setCode((string) $grocycode)->setSize($size)->getDatamatrixPngData();
		}
		else
		{
			$png = (new BarcodeFactory())->setType('C128')->setCode((string) $grocycode)->setHeight($size)->getBarcodePngData();
		}

		$isDownload = $request->getQueryParam('download', false);
		if ($isDownload)
		{
			$response = $response->withHeader('Content-Type', 'application/octet-stream')
				->withHeader('Content-Disposition', 'attachment; filename=grocycode.png')
				->withHeader('Content-Length', strlen($png))
				->withHeader('Cache-Control', 'no-cache')
				->withHeader('Last-Modified', gmdate('D, d M Y H:i:s') . ' GMT');
		}
		else
		{
			$response = $response->withHeader('Content-Type', 'image/png')
				->withHeader('Content-Length', strlen($png))
				->withHeader('Cache-Control', 'no-cache')
				->withHeader('Last-Modified', gmdate('D, d M Y H:i:s') . ' GMT');
		}
		$response->getBody()->write($png);
		return $response;
	}
}
