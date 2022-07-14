<?php
    class Component {
        public $id;
        public $model;
        public $unit_price;
        public $quantity;

        public function __construct($_id, $_model, $_unit_price, $_quantity) {
            $this->id = $_id;
            $this->model = rtrim($_model);
            $this->unit_price = $_unit_price;
            $this->quantity = $_quantity;
        }
    }

    class CPU extends Component {
        public $socket;
        public $cores;
        public $threads;
        public $clock_speed;
        public $boost_clock_speed;
        public $stock_included;
        public $TDP;

        public function __construct($_id, $_model, $_unit_price, $_quantity, $_socket,
                                    $_cores, $_threads, $_clock_speed, $_boost_clock_speed, $_stock_included, $_TDP) {
            parent::__construct($_id, $_model, $_unit_price, $_quantity);
            $this->socket = rtrim($_socket);
            $this->cores = $_cores;
            $this->threads = $_threads;
            $this->clock_speed = $_clock_speed;
            $this->boost_clock_speed = $_boost_clock_speed;
            $this->stock_included = $_stock_included;
            $this->TDP = $_TDP;
        }
    }

    class CPU_fan extends Component {
        public $length;

        public function __construct($_id, $_model, $_unit_price, $_quantity, $_length) {
            parent::__construct($_id, $_model, $_unit_price, $_quantity);
            $this->length = $_length;
        }
    }

    class RAM extends Component {
        public $ddr;
        public $memory_size;
        public $frequency;

        public function __construct($_id, $_model, $_unit_price, $_quantity, $_ddr, $_memory_size, $_frequency) {
            parent::__construct($_id, $_model, $_unit_price, $_quantity);
            $this->ddr = rtrim($_ddr);
            $this->memory_size = $_memory_size;
            $this->frequency = $_frequency;
        }
    }

    class Motherboard extends Component {
        public $socket;
        public $form;
        public $chipset;
        public $safe_CPU_TDP;

        public function __construct($_id, $_model, $_unit_price, $_quantity, $_socket, $_form, $_chipset, $_safe_CPU_TDP) {
            parent::__construct($_id, $_model, $_unit_price, $_quantity);
            $this->socket = rtrim($_socket);
            $this->form = rtrim($_form);
            $this->chipset = rtrim($_chipset);
            $this->safe_CPU_TDP = $_safe_CPU_TDP;
        }
    }

    class PSU extends Component {
        public $power;
        public $isFullyModular;
        public $fan;
        public $certificate;

        public function __construct($_id, $_model, $_unit_price, $_quantity, $_power, $_isFullyModular, $_fan, $_certificate) {
            parent::__construct($_id, $_model, $_unit_price, $_quantity);
            $this->power = $_power;
            $this->isFullyModular = $_isFullyModular;
            $this->fan = $_fan;
            $this->certificate = rtrim($_certificate);
        }
    }

    class SSD extends Component {
        public $format;
        public $interface;
        public $seq_write_speed;
        public $seq_read_speed;
        public $capacity;

        public function __construct($_id, $_model, $_unit_price, $_quantity, $_format, $_interface, $_seq_write_speed,
                                    $_seq_read_speed, $_capacity) {
            parent::__construct($_id, $_model, $_unit_price, $_quantity);
            $this->format = rtrim($_format);
            $this->interface = rtrim($_interface);
            $this->seq_write_speed = $_seq_write_speed;
            $this->seq_read_speed = $_seq_read_speed;
            $this->capacity = $_capacity;
        }
    }

    class HDD extends Component {
        public $format;
        public $rotation_speed;
        public $capacity;

        public function __construct($_id, $_model, $_unit_price, $_quantity, $_format, $_rotation_speed, $_capacity) {
            parent::__construct($_id, $_model, $_unit_price, $_quantity);
            $this->format = rtrim($_format);
            $this->rotation_speed = $_rotation_speed;
            $this->capacity = $_capacity;
        }
    }

    class GPU extends Component {
        public $boost_clock;
        public $memory_capacity;
        public $memory_type;
        public $length;
        public $TDP;

        public function __construct($_id, $_model, $_unit_price, $_quantity, $_boost_clock, $_memory_capacity, $_memory_type, $_length, $_TDP) {
            parent::__construct($_id, $_model, $_unit_price, $_quantity);
            $this->boost_clock = $_boost_clock;
            $this->memory_capacity = $_memory_capacity;
            $this->memory_type = rtrim($_memory_type);
            $this->length = $_length;
            $this->TDP = $_TDP;
        }
    }

    class PC_Case extends Component {
        public $format;
        public $height;
        public $width;
        public $length;
        public $weight;
        public $gpu_length;
        public $cooler_height;

        public function __construct($_id, $_model, $_unit_price, $_quantity, $_format, $_height, $_width, $_length, $_weight, $_gpu_length, $_cooler_height) {
            parent::__construct($_id, $_model, $_unit_price, $_quantity);
            $this->format = array(rtrim($_format));
            $this->height = $_height;
            $this->width = $_width;
            $this->length = $_length;
            $this->weight = $_weight;
            $this->gpu_length = $_gpu_length;
            $this->cooler_height = $_cooler_height;
        }
    }
?>