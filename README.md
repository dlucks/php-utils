# php-utils
Collection of utility classes for PHP.

## Arr
Class providing some functions for working with arrays.

### Arr::get
Method for accessing fields in simple and multidimensional arrays.
Returns a default value if key does not exist in array. 

```php
// Will return 'val1'.
Arr::get(array('val1', 'val2', 'val3'), 1)

// Will return NULL.
Arr::get(array('val1', 'val2', 'val3'), 5)

// Will return 'default'.
Arr::get(array('val1', 'val2', 'val3'), 5, 'default')

// Will return 'val1'.
Arr::get(array('key1' => 'val1'), 'key1')

// Will return NULL.
Arr::get(array('key1' => 'val1'), 'key2')

// Will return 'val'.
Arr::get(array('key1' => array('key2' => 'val')), 'key1.key2')

// Will return NULL.
Arr::get(array('key1' => array('key2' => 'val')), 'key1.key5')

// Will return NULL.
Arr::get(array('key1' => array('key2' => 'val')), 'key5.key2')
```