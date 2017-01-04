<?php namespace Anomaly\Streams\Platform\Application\Command;

/**
 * Class ReadEnvironmentFile
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ReadEnvironmentFile
{

    /**
     * Handle the command.
     *
     * @return array
     */
    public function handle()
    {
        $data = [];

        if (!file_exists($env = base_path('.env'))) {
            return $data;
        }

        foreach (file($env, FILE_IGNORE_NEW_LINES) as $line) {

            // Check for # comments.
            if (starts_with($line, '#')) {
                $data[] = $line;
            } elseif (strpos($line, '=')) {
                list($key, $value) = explode('=', $line);

                $data[$key] = $value;
            }
        }

        return $data;
    }
}
