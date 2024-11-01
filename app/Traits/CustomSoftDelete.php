<?php

    namespace App\Traits;


    trait CustomSoftDelete
    {

        /**
         * 起動時の処理
         * @return void
         */
        public static function bootCustomSoftDelete(): void
        {
            static::addGlobalScope('CustomSoftDelete', function ($builder) {
                $builder->where('del_flg', 0);
            });
        }

        /**
         * モデルの論理削除
         * @return bool
         */
        public function delete(): bool
        {
            // 削除フラグをセット
            $this->setAttribute('del_flg', 1);
            return $this->save();
        }

        /**
         * モデルの復元
         * @return bool
         */
        public function restore(): bool
        {
            // 削除フラグをリセット
            $this->setAttribute('del_flg', 0);
            return $this->save();
        }

        /**
         * モデルの永続削除
         * @return bool|null
         */
        public function forceDelete(): ?bool
        {
            // 標準の削除処理を実行
            return parent::delete();
        }
    }
