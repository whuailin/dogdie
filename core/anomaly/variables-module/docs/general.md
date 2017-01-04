# Variables Module

- [Introduction](#introduction)
- [Managing Variables](#managing-variables)
	- [Obtaining Variable Values](#obtaining-variable-values)


<a name="introduction"></a>
## Introduction

`anomaly.module.variables`

The Variables module provides a convenient area to store single, Streams powered values that are accessible throughout your application. Variables are a good way to store small bits of information that may need to change later. For instance, you can create a variable for the site's official logo. If it ever changes, it can be easily changed in the Variables module.


<a name="managing-variables"></a>
## Managing Variables

Variables can be easily managed through the `control panel`. To get started navigate to the Variables module and select **New Variable** in the upper right.

First, you need to pick the `Field Type` you would like to use for the variable.

![](https://raw.githubusercontent.com/anomalylabs/variables-module/1.0/master/docs/img/modal.png)

Next fill out the variable name, slug and field type configuration. The **slug** value will be used when accessing the variable later with the plugin or repository and will also be used for the database column name for the variable.

![](https://raw.githubusercontent.com/anomalylabs/variables-module/1.0/master/docs/img/fields.png)

Lastly, set the value of the variable by selecting **Set Value** next to the variable in the list of available variables.

![](https://raw.githubusercontent.com/anomalylabs/variables-module/1.0/master/docs/img/table.png)

<a name="obtaining-variable-values"></a>
### Obtaining Variable Values

#### Via Plugin

You can access plugin values using the `Variables Plugin` that's packaged with the module.

	{{ variables_get('example_variable') }}

You may also access output methods from the field type you chose:

	{{ variables_get('example_variable').values }}

#### Via Repository

The `VariableRepositioryInterface` can be resolved and used to access the variables directly.

	$variables->get('example_variable');

As with plugin usage, the field type output methods are accessible:

	$variables->get('example_variable')->values;
