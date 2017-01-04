# Text Field Type

- [Introduction](#introduction)
- [Configuration](#configuration)
- [Output](#output)


<a name="introduction"></a>
## Introduction

`anomaly.field_type.text`

The text field type provides a basic HTML input with configurable type and placeholder attributes.


<a name="configuration"></a>
## Configuration

**Example Definition:**

    protected $fields = [
        'example' => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'type'          => 'text',
                'min'           => 10,
                'max'           => 100,
                'default_value' => 'Ryan Thompson'
            ]
        ]
    ];

### `type`

The type of text input to use. Valid options are `'text'`, `'email'`, or `'password'`. The default value is `'text'`.

### `min`

The minimum input length allowed. By default no minimum is enforced.

### `max`

The maximum input length allowed. By default no maximum is enforced.

### `default_value`

The default input value. The default value is `null`.


<a name="output"></a>
## Output

This field type returns the value from the database by default.