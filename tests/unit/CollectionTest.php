<?php

class CollectionTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function empty_instantiated_collection_returns_no_items() {
        $collection = new \App\Support\Collection;

        $this->assertEmpty($collection->get());
    }

    /** @test */
    public function count_is_correct_for_items_passed_in() {
        $collection = new \App\Support\Collection([
            'one', 'two', 'three'
        ]);

        $this->assertEquals(3, $collection->count());
    }

    /** @test */
    public function items_returned_match_items_passed_in() {
        $collection = new \App\Support\Collection([
            'aa', 'bb'
        ]);

        $this->assertCount(2, $collection->get());
        $this->assertEquals('aa', $collection->get()[0]);
        $this->assertEquals('bb', $collection->get()[1]);
    }

    /** @test */
    public function collection_is_instance_of_iterator_aggregate() {
        $collection = new \App\Support\Collection;

        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    /** @test */
    public function collection_can_be_iterated() {
        $collection = new \App\Support\Collection([
            'one', 'two', 'three'
        ]);

        $items = [];

        foreach ($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(3, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
    }

    /** @test */
    public function can_add_items_to_existing_collection() {
        $collection = new \App\Support\Collection(['one', 'two']);

        $collection->add(['three']);

        $this->assertCount(3, $collection->get());
        $this->assertEquals(3, $collection->count());
    }


    /** @test */
    public function collection_can_be_merged_with_another_collection() {
        $collection1 = new \App\Support\Collection(['one', 'two']);
        $collection2 = new \App\Support\Collection(['three', 'four', 'five']);

        $collection1->merge($collection2);

        $this->assertCount(5, $collection1->get());
        // $this->assertEqual()
    }

    /** @test */
    public function returns_json_encoded_items() {
        $collection = new \App\Support\Collection([
            ['username' => 'alex'],
            ['username' => 'billy']
        ]);

        $this->assertInternalType('string', $collection->toJson());
        $this->assertEquals('[{"username":"alex"},{"username":"billy"}]', $collection->toJson());
    }

    /** @test */
    public function json_encoding_a_collection_object_returns_json() {
        $collection = new \App\Support\Collection([
            ['username' => 'alex'],
            ['username' => 'billy']
        ]);

        $encoded = json_encode($collection);

        $this->assertInternalType('string', $encoded);
        $this->assertEquals('[{"username":"alex"},{"username":"billy"}]', $encoded);

    }
}