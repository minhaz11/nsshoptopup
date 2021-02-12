<?php

use Intervention\Image\Facades\Image;

if (! function_exists('imageUpload')) {
    function imageUpload($file, $location, $size = null, $old = null, $thumb = null)
    {
        $path = makeDirectory($location);
        if (!$path) throw new Exception('File could not been created.');

        if (!empty($old)) {
            removeFile($location . '/' . $old);
            removeFile($location . '/thumb_' . $old);
        }


        $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();


        $image = Image::make($file);


        if (!empty($size)) {
            $size = explode('x', strtolower($size));
            $image->resize($size[0], $size[1],function($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }
        $image->save($location . '/' . $filename);

        if (!empty($thumb)) {

            $thumb = explode('x', $thumb);
            Image::make($file)->resize($thumb[0], $thumb[1],function($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($location . '/thumb_' . $filename);
        }

        return $filename;
    }
}

function makeDirectory($path)
{
    if (file_exists($path)) return true;
    return mkdir($path, 0755, true);
}


function removeFile($path)
{
    return file_exists($path) && is_file($path) ? @unlink($path) : false;
}

function getNumber($amount, $length = 0)
{
    if(0 < $length){
        return number_format( $amount + 0, $length);
    }
    return $amount + 0;
}

function getIp()
{
    $ip = null;
    $deep_detect = TRUE;

    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }


    $xml = @simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . $ip);


    $country = @$xml->geoplugin_countryName;
    $city = @$xml->geoplugin_city;
    $area = @$xml->geoplugin_areaCode;
    $code = @$xml->geoplugin_countryCode;
    $long = @$xml->geoplugin_longitude;
    $lat = @$xml->geoplugin_latitude;

    $data['country'] = $country;
    $data['city'] = $city;
    $data['area'] = $area;
    $data['code'] = $code;
    $data['long'] = $long;
    $data['lat'] = $lat;
    $data['ip'] = request()->ip();
    $data['time'] = date('d-m-Y h:i:s A');


    return $data;
}

function activeLink($routeName, $type = null)
{
    if ($type == 3) {
        $class = 'side-menu--open';
    } elseif ($type == 2) {
        $class = 'sidebar-submenu__open';
    } else {
        $class = 'active';
    }
    if (is_array($routeName)) {
        foreach ($routeName as $key => $value) {
            if (request()->routeIs($value)) {
                return $class;
            }
        }
    } elseif (request()->routeIs($routeName)) {
        return $class;
    }
}

function imageFile($image,$size = null)
{
    $clean = '';
    // $size = $size ? $size : 'undefined';
    if (file_exists($image) && is_file($image)) {
        return asset($image) . $clean;
    }else{
        return "https://dummyimage.com/$size/6a6b6b/fff";
    }
}

function dt($date, $format = 'd M, Y h:i A')
{
    $lang = session()->get('lang');
    \Carbon\Carbon::setlocale($lang);
    return \Carbon\Carbon::parse($date)->translatedFormat($format);
}


