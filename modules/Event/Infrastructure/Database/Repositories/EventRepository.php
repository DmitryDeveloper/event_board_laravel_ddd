<?php

namespace Modules\Event\Infrastructure\Database\Repositories;

use Illuminate\Support\Collection;
use Modules\Event\Domain\Aggregates\Event;
use Modules\Event\Domain\Entities\Category;
use Modules\Event\Domain\Repositories\EventRepositoryInterface;
use Modules\Event\Domain\ValueObjects\EventDetails;
use Modules\Event\Infrastructure\Database\Models\Event as EventModel;

class EventRepository implements EventRepositoryInterface
{
    protected EventModel $model;

    public function __construct(EventModel $model)
    {
        $this->model = $model;
    }

    public function save(Event $event): void
    {
        $eventDetails = $event->getEventDetails();
        $this->model->fill([
            'title' => $eventDetails->getTitle(),
            'short_description' => $eventDetails->getShortDescription(),
            'description' => $eventDetails->getDescription(),
            'user_id' => $event->getUserId(),
            'is_approved' => $eventDetails->isApproved(),
            'status' => $eventDetails->getStatus(),
        ]);

        $this->model->save();
        $this->model->categories()->sync($event->getCategories());
    }

    public function find(string $eventId): Event
    {
        $model = $this->model->find($eventId);

        $event = new Event(
            new EventDetails(
                title: $model->title,
                shortDescription: $model->short_description,
                description: $model->description,
                status: $model->status,
                isApproved: $model->is_approved,
            ),
            userId: $model->user_id,
        );

        $categoryModels = $model->categories;

        foreach ($categoryModels as $categoryModel) {
            $event->addCategory(new Category(
                name: $categoryModel->name,
                description: $categoryModel->description
            ));
        }

        return $event;
    }

    public function delete(string $id): void
    {
        $model = $this->model->find($id);
        $model->delete();
    }

    public function findByCategoryId(string $categoryId): Collection
    {
        return $this->model->where('category_id', $categoryId)->get();
    }
}
