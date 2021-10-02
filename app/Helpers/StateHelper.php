<?php

namespace App\Helpers;

use App\Http\Resources\UserStateResource;

class StateHelper
{
    protected array $state;

    /**
     * Set the app's state
     *
     * @return array
     */
    public function getAppState(): array
    {
        $this->putUserIntoState()
            ->putSessionFlashDataIntoState();

        return $this->state;
    }

    /**
     * Put the user into state
     *
     * @return $this
     */
    private function putUserIntoState(): self
    {
        if (auth()->check()) {
            $this->state['user'] = new UserStateResource(auth()->user());
        }

        return $this;
    }

    /**
     * Grab any flashed data and store it into state.
     *
     * @return $this
     */
    private function putSessionFlashDataIntoState(): self
    {
        $flashKeys = session()->get('_flash.new', []);
        $flashItems = [];

        // Now we need to loop through each of the flashed keys
        // and query the session to get the data for each key.

        foreach ($flashKeys as $sessionItemKey) {
            $sessionItem = session()->get($sessionItemKey, null);
            $flashItems[$sessionItemKey] = $sessionItem;
        }

        // Store the result in the state.

        $this->state['sessionFlashData'] = $flashItems;

        return $this;
    }
}
