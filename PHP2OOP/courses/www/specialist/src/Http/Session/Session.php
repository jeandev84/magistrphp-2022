<?php
namespace Specialist\Http\Session;

class Session
{


     /**
      * @var string
     */
     protected $flashKey = '';



     /**
      * @param string $flashKey
     */
     public function __construct(string $flashKey = 'session.flash')
     {
          if (session_status() === PHP_SESSION_NONE) {
               session_start();
          }
     }





     /**
      * @param string $name
      * @param $value
      * @return $this
     */
     public function set(string $name, $value): static
     {
         $_SESSION[$name] = $value;

         return $this;
     }




     /**
      * @param string $name
      * @return bool
     */
     public function has(string $name): bool
     {
         return array_key_exists($name, $_SESSION);
     }



     /**
      * @param string $name
      * @return mixed
     */
     public function get(string $name)
     {
          if (! $this->has($name)) {
              return null;
          }

          return $_SESSION[$name];
     }




     /**
      * @param string $type
      * @param $value
      * @return $this
     */
     public function addFlash(string $type, $value): static
     {
          $_SESSION[$this->flashKey][] = [$type => $value];

          return $this;
     }




     /**
      * @return array|null
     */
     public function getFlashes(): ?array
     {
          return $this->get($this->flashKey);
     }





     /**
      * @param string $name
      * @return void
     */
     public function remove(string $name): void
     {
          unset($_SESSION[$name]);
     }




     /**
      * @return false|string
     */
     public function id(): bool|string
     {
         return session_id();
     }




     /**
      * @return false|string
     */
     public function name(): bool|string
     {
          return session_name();
     }




     /**
      * @return false|string
     */
     public function module(): bool|string
     {
          return session_module_name();
     }




     /**
      * @return bool
     */
     public function regenerate(): bool
     {
         return session_regenerate_id();
     }




     /**
      * @return bool
     */
     public function abort(): bool
     {
          return session_abort();
     }




     /**
      * @return bool
     */
     public function commit(): bool
     {
         return session_commit();
     }




     /**
      * @return array
     */
     public function cookiesParams(): array
     {
         return session_get_cookie_params();
     }




     /**
      * @return false|int
     */
     public function gc(): bool|int
     {
          return session_gc();
     }




     /**
      * @param int $seconds
      * @return false|int
     */
     public function cacheExpiresAfter(int $seconds): bool|int
     {
          return session_cache_expire($seconds);
     }




     /**
      * @param $value
      * @return false|string
     */
     public function cacheLimit($value): bool|string
     {
         return session_cache_limiter($value);
     }





     /**
      * @param callable $handler
      * @return void
     */
     public function saveHandler(callable $handler): void
     {
         // session_set_save_handler();
     }




     /**
      * @param string $path
      * @return void
     */
     public function savePath(string $path): void
     {
         session_save_path($path);
     }





     /**
      * @param string $id
      * @return false|string
     */
     public function create(string $id): bool|string
     {
        return session_create_id($id);
     }





     /**
      * @return void
     */
     public function destroy(): void
     {
          foreach ($_SESSION as $name => $value) {
              $this->remove($name);
          }

          session_destroy();
     }
}