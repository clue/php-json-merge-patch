# clue/json-merge-patch [![Build Status](https://travis-ci.org/clue/php-json-merge-patch.svg?branch=master)](https://travis-ci.org/clue/php-json-merge-patch)

JSON merge patch ([RFC 7396](https://tools.ietf.org/html/rfc7396)) is a
simple alternative to JSON patch ([RFC 6902](http://tools.ietf.org/html/rfc6902)) 

The JSON merge patch format is defined in RFC 7396 (originally 7386).
It is primarily intended for use with the
HTTP PATCH method as a means of describing a set of modifications to
a target resource's content.

> Note: This project is in beta stage! Feel free to report any issues you encounter.

## Install

The recommended way to install this library is [through composer](http://getcomposer.org). [New to composer?](http://getcomposer.org/doc/00-intro.md)

```JSON
{
    "require": {
        "clue/json-merge-patch": "~0.1.0"
    }
}
```

## License

MIT
