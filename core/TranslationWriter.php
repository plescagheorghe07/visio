<?php

declare(strict_types=1);

namespace Visio\Core;

final class TranslationWriter
{
    private const LANG_DIR = __DIR__ . '/../config';

    public function getTranslations(string $lang): array
    {
        $file = self::LANG_DIR . "/lang_{$lang}.php";
        if (!is_file($file)) {
            return [];
        }
        return require $file;
    }

    public function saveTranslations(string $lang, array $translations): bool
    {
        if (!in_array($lang, ['ro', 'en', 'ru'], true)) {
            return false;
        }

        $file = self::LANG_DIR . "/lang_{$lang}.php";
        $content = "<?php\n\ndeclare(strict_types=1);\n\nreturn " . $this->exportArray($translations) . ";\n";

        return file_put_contents($file, $content, LOCK_EX) !== false;
    }

    private function exportArray(array $data, int $depth = 1): string
    {
        $indent = str_repeat('    ', $depth);
        $lines = ["[\n"];

        foreach ($data as $key => $value) {
            $keyStr = var_export((string) $key, true);
            if (is_array($value)) {
                $valStr = $this->exportArray($value, $depth + 1);
            } else {
                $valStr = var_export((string) $value, true);
            }
            $lines[] = "{$indent}{$keyStr} => {$valStr},\n";
        }

        $lines[] = str_repeat('    ', $depth - 1) . ']';
        return implode('', $lines);
    }
}
