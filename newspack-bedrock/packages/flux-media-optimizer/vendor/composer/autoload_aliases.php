<?php

// Functions and constants

namespace {
    if(!function_exists('\\trigger_deprecation')){
        function trigger_deprecation(...$args) {
            return \fluxmedia_trigger_deprecation(...func_get_args());
        }
    }

}


namespace FluxMedia {

    class AliasAutoloader
    {
        private string $includeFilePath;

        private array $autoloadAliases = array (
  'Alchemy\\BinaryDriver\\AbstractBinary' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractBinary',
    'isabstract' => true,
    'namespace' => 'Alchemy\\BinaryDriver',
    'extends' => 'FluxMedia\\Alchemy\\BinaryDriver\\AbstractBinary',
    'implements' => 
    array (
      0 => 'Alchemy\\BinaryDriver\\BinaryInterface',
    ),
  ),
  'Alchemy\\BinaryDriver\\BinaryDriverTestCase' => 
  array (
    'type' => 'class',
    'classname' => 'BinaryDriverTestCase',
    'isabstract' => false,
    'namespace' => 'Alchemy\\BinaryDriver',
    'extends' => 'FluxMedia\\Alchemy\\BinaryDriver\\BinaryDriverTestCase',
    'implements' => 
    array (
    ),
  ),
  'Alchemy\\BinaryDriver\\Configuration' => 
  array (
    'type' => 'class',
    'classname' => 'Configuration',
    'isabstract' => false,
    'namespace' => 'Alchemy\\BinaryDriver',
    'extends' => 'FluxMedia\\Alchemy\\BinaryDriver\\Configuration',
    'implements' => 
    array (
      0 => 'Alchemy\\BinaryDriver\\ConfigurationInterface',
    ),
  ),
  'Alchemy\\BinaryDriver\\Exception\\ExecutableNotFoundException' => 
  array (
    'type' => 'class',
    'classname' => 'ExecutableNotFoundException',
    'isabstract' => false,
    'namespace' => 'Alchemy\\BinaryDriver\\Exception',
    'extends' => 'FluxMedia\\Alchemy\\BinaryDriver\\Exception\\ExecutableNotFoundException',
    'implements' => 
    array (
      0 => 'Alchemy\\BinaryDriver\\Exception\\ExceptionInterface',
    ),
  ),
  'Alchemy\\BinaryDriver\\Exception\\ExecutionFailureException' => 
  array (
    'type' => 'class',
    'classname' => 'ExecutionFailureException',
    'isabstract' => false,
    'namespace' => 'Alchemy\\BinaryDriver\\Exception',
    'extends' => 'FluxMedia\\Alchemy\\BinaryDriver\\Exception\\ExecutionFailureException',
    'implements' => 
    array (
      0 => 'Alchemy\\BinaryDriver\\Exception\\ExceptionInterface',
    ),
  ),
  'Alchemy\\BinaryDriver\\Exception\\InvalidArgumentException' => 
  array (
    'type' => 'class',
    'classname' => 'InvalidArgumentException',
    'isabstract' => false,
    'namespace' => 'Alchemy\\BinaryDriver\\Exception',
    'extends' => 'FluxMedia\\Alchemy\\BinaryDriver\\Exception\\InvalidArgumentException',
    'implements' => 
    array (
      0 => 'Alchemy\\BinaryDriver\\Exception\\ExceptionInterface',
    ),
  ),
  'Alchemy\\BinaryDriver\\Listeners\\DebugListener' => 
  array (
    'type' => 'class',
    'classname' => 'DebugListener',
    'isabstract' => false,
    'namespace' => 'Alchemy\\BinaryDriver\\Listeners',
    'extends' => 'FluxMedia\\Alchemy\\BinaryDriver\\Listeners\\DebugListener',
    'implements' => 
    array (
      0 => 'Alchemy\\BinaryDriver\\Listeners\\ListenerInterface',
    ),
  ),
  'Alchemy\\BinaryDriver\\Listeners\\Listeners' => 
  array (
    'type' => 'class',
    'classname' => 'Listeners',
    'isabstract' => false,
    'namespace' => 'Alchemy\\BinaryDriver\\Listeners',
    'extends' => 'FluxMedia\\Alchemy\\BinaryDriver\\Listeners\\Listeners',
    'implements' => 
    array (
    ),
  ),
  'Alchemy\\BinaryDriver\\ProcessBuilderFactory' => 
  array (
    'type' => 'class',
    'classname' => 'ProcessBuilderFactory',
    'isabstract' => false,
    'namespace' => 'Alchemy\\BinaryDriver',
    'extends' => 'FluxMedia\\Alchemy\\BinaryDriver\\ProcessBuilderFactory',
    'implements' => 
    array (
      0 => 'Alchemy\\BinaryDriver\\ProcessBuilderFactoryInterface',
    ),
  ),
  'Alchemy\\BinaryDriver\\ProcessRunner' => 
  array (
    'type' => 'class',
    'classname' => 'ProcessRunner',
    'isabstract' => false,
    'namespace' => 'Alchemy\\BinaryDriver',
    'extends' => 'FluxMedia\\Alchemy\\BinaryDriver\\ProcessRunner',
    'implements' => 
    array (
      0 => 'Alchemy\\BinaryDriver\\ProcessRunnerInterface',
    ),
  ),
  'Evenement\\EventEmitter' => 
  array (
    'type' => 'class',
    'classname' => 'EventEmitter',
    'isabstract' => false,
    'namespace' => 'Evenement',
    'extends' => 'FluxMedia\\Evenement\\EventEmitter',
    'implements' => 
    array (
      0 => 'Evenement\\EventEmitterInterface',
    ),
  ),
  'Neutron\\TemporaryFilesystem\\IOException' => 
  array (
    'type' => 'class',
    'classname' => 'IOException',
    'isabstract' => false,
    'namespace' => 'Neutron\\TemporaryFilesystem',
    'extends' => 'FluxMedia\\Neutron\\TemporaryFilesystem\\IOException',
    'implements' => 
    array (
    ),
  ),
  'Neutron\\TemporaryFilesystem\\Manager' => 
  array (
    'type' => 'class',
    'classname' => 'Manager',
    'isabstract' => false,
    'namespace' => 'Neutron\\TemporaryFilesystem',
    'extends' => 'FluxMedia\\Neutron\\TemporaryFilesystem\\Manager',
    'implements' => 
    array (
      0 => 'Neutron\\TemporaryFilesystem\\TemporaryFilesystemInterface',
    ),
  ),
  'Neutron\\TemporaryFilesystem\\TemporaryFilesystem' => 
  array (
    'type' => 'class',
    'classname' => 'TemporaryFilesystem',
    'isabstract' => false,
    'namespace' => 'Neutron\\TemporaryFilesystem',
    'extends' => 'FluxMedia\\Neutron\\TemporaryFilesystem\\TemporaryFilesystem',
    'implements' => 
    array (
      0 => 'Neutron\\TemporaryFilesystem\\TemporaryFilesystemInterface',
    ),
  ),
  'FFMpeg\\Coordinate\\AspectRatio' => 
  array (
    'type' => 'class',
    'classname' => 'AspectRatio',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Coordinate',
    'extends' => 'FluxMedia\\FFMpeg\\Coordinate\\AspectRatio',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Coordinate\\Dimension' => 
  array (
    'type' => 'class',
    'classname' => 'Dimension',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Coordinate',
    'extends' => 'FluxMedia\\FFMpeg\\Coordinate\\Dimension',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Coordinate\\FrameRate' => 
  array (
    'type' => 'class',
    'classname' => 'FrameRate',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Coordinate',
    'extends' => 'FluxMedia\\FFMpeg\\Coordinate\\FrameRate',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Coordinate\\Point' => 
  array (
    'type' => 'class',
    'classname' => 'Point',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Coordinate',
    'extends' => 'FluxMedia\\FFMpeg\\Coordinate\\Point',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Coordinate\\TimeCode' => 
  array (
    'type' => 'class',
    'classname' => 'TimeCode',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Coordinate',
    'extends' => 'FluxMedia\\FFMpeg\\Coordinate\\TimeCode',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Driver\\FFMpegDriver' => 
  array (
    'type' => 'class',
    'classname' => 'FFMpegDriver',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Driver',
    'extends' => 'FluxMedia\\FFMpeg\\Driver\\FFMpegDriver',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Driver\\FFProbeDriver' => 
  array (
    'type' => 'class',
    'classname' => 'FFProbeDriver',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Driver',
    'extends' => 'FluxMedia\\FFMpeg\\Driver\\FFProbeDriver',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Exception\\ExecutableNotFoundException' => 
  array (
    'type' => 'class',
    'classname' => 'ExecutableNotFoundException',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Exception',
    'extends' => 'FluxMedia\\FFMpeg\\Exception\\ExecutableNotFoundException',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Exception\\InvalidArgumentException' => 
  array (
    'type' => 'class',
    'classname' => 'InvalidArgumentException',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Exception',
    'extends' => 'FluxMedia\\FFMpeg\\Exception\\InvalidArgumentException',
    'implements' => 
    array (
      0 => 'FFMpeg\\Exception\\ExceptionInterface',
    ),
  ),
  'FFMpeg\\Exception\\LogicException' => 
  array (
    'type' => 'class',
    'classname' => 'LogicException',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Exception',
    'extends' => 'FluxMedia\\FFMpeg\\Exception\\LogicException',
    'implements' => 
    array (
      0 => 'FFMpeg\\Exception\\ExceptionInterface',
    ),
  ),
  'FFMpeg\\Exception\\RuntimeException' => 
  array (
    'type' => 'class',
    'classname' => 'RuntimeException',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Exception',
    'extends' => 'FluxMedia\\FFMpeg\\Exception\\RuntimeException',
    'implements' => 
    array (
      0 => 'FFMpeg\\Exception\\ExceptionInterface',
    ),
  ),
  'FFMpeg\\FFMpeg' => 
  array (
    'type' => 'class',
    'classname' => 'FFMpeg',
    'isabstract' => false,
    'namespace' => 'FFMpeg',
    'extends' => 'FluxMedia\\FFMpeg\\FFMpeg',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\FFMpegServiceProvider' => 
  array (
    'type' => 'class',
    'classname' => 'FFMpegServiceProvider',
    'isabstract' => false,
    'namespace' => 'FFMpeg',
    'extends' => 'FluxMedia\\FFMpeg\\FFMpegServiceProvider',
    'implements' => 
    array (
      0 => 'Silex\\ServiceProviderInterface',
    ),
  ),
  'FFMpeg\\FFProbe\\DataMapping\\AbstractData' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractData',
    'isabstract' => true,
    'namespace' => 'FFMpeg\\FFProbe\\DataMapping',
    'extends' => 'FluxMedia\\FFMpeg\\FFProbe\\DataMapping\\AbstractData',
    'implements' => 
    array (
      0 => 'Countable',
    ),
  ),
  'FFMpeg\\FFProbe\\DataMapping\\Format' => 
  array (
    'type' => 'class',
    'classname' => 'Format',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\FFProbe\\DataMapping',
    'extends' => 'FluxMedia\\FFMpeg\\FFProbe\\DataMapping\\Format',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\FFProbe\\DataMapping\\Stream' => 
  array (
    'type' => 'class',
    'classname' => 'Stream',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\FFProbe\\DataMapping',
    'extends' => 'FluxMedia\\FFMpeg\\FFProbe\\DataMapping\\Stream',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\FFProbe\\DataMapping\\StreamCollection' => 
  array (
    'type' => 'class',
    'classname' => 'StreamCollection',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\FFProbe\\DataMapping',
    'extends' => 'FluxMedia\\FFMpeg\\FFProbe\\DataMapping\\StreamCollection',
    'implements' => 
    array (
      0 => 'Countable',
      1 => 'IteratorAggregate',
    ),
  ),
  'FFMpeg\\FFProbe\\Mapper' => 
  array (
    'type' => 'class',
    'classname' => 'Mapper',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\FFProbe',
    'extends' => 'FluxMedia\\FFMpeg\\FFProbe\\Mapper',
    'implements' => 
    array (
      0 => 'FFMpeg\\FFProbe\\MapperInterface',
    ),
  ),
  'FFMpeg\\FFProbe\\OptionsTester' => 
  array (
    'type' => 'class',
    'classname' => 'OptionsTester',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\FFProbe',
    'extends' => 'FluxMedia\\FFMpeg\\FFProbe\\OptionsTester',
    'implements' => 
    array (
      0 => 'FFMpeg\\FFProbe\\OptionsTesterInterface',
    ),
  ),
  'FFMpeg\\FFProbe\\OutputParser' => 
  array (
    'type' => 'class',
    'classname' => 'OutputParser',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\FFProbe',
    'extends' => 'FluxMedia\\FFMpeg\\FFProbe\\OutputParser',
    'implements' => 
    array (
      0 => 'FFMpeg\\FFProbe\\OutputParserInterface',
    ),
  ),
  'FFMpeg\\Filters\\AdvancedMedia\\ANullSrcFilter' => 
  array (
    'type' => 'class',
    'classname' => 'ANullSrcFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\AdvancedMedia',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\AdvancedMedia\\ANullSrcFilter',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Filters\\AdvancedMedia\\AbstractComplexFilter' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractComplexFilter',
    'isabstract' => true,
    'namespace' => 'FFMpeg\\Filters\\AdvancedMedia',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\AdvancedMedia\\AbstractComplexFilter',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\AdvancedMedia\\ComplexCompatibleFilter',
    ),
  ),
  'FFMpeg\\Filters\\AdvancedMedia\\ComplexFilterContainer' => 
  array (
    'type' => 'class',
    'classname' => 'ComplexFilterContainer',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\AdvancedMedia',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\AdvancedMedia\\ComplexFilterContainer',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\AdvancedMedia\\ComplexFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\AdvancedMedia\\ComplexFilters' => 
  array (
    'type' => 'class',
    'classname' => 'ComplexFilters',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\AdvancedMedia',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\AdvancedMedia\\ComplexFilters',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Filters\\AdvancedMedia\\CustomComplexFilter' => 
  array (
    'type' => 'class',
    'classname' => 'CustomComplexFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\AdvancedMedia',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\AdvancedMedia\\CustomComplexFilter',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Filters\\AdvancedMedia\\SineFilter' => 
  array (
    'type' => 'class',
    'classname' => 'SineFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\AdvancedMedia',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\AdvancedMedia\\SineFilter',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Filters\\AdvancedMedia\\TestSrcFilter' => 
  array (
    'type' => 'class',
    'classname' => 'TestSrcFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\AdvancedMedia',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\AdvancedMedia\\TestSrcFilter',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Filters\\AdvancedMedia\\XStackFilter' => 
  array (
    'type' => 'class',
    'classname' => 'XStackFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\AdvancedMedia',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\AdvancedMedia\\XStackFilter',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Filters\\Audio\\AddMetadataFilter' => 
  array (
    'type' => 'class',
    'classname' => 'AddMetadataFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Audio',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Audio\\AddMetadataFilter',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\Audio\\AudioFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Audio\\AudioClipFilter' => 
  array (
    'type' => 'class',
    'classname' => 'AudioClipFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Audio',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Audio\\AudioClipFilter',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\Audio\\AudioFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Audio\\AudioFilters' => 
  array (
    'type' => 'class',
    'classname' => 'AudioFilters',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Audio',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Audio\\AudioFilters',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Filters\\Audio\\AudioResamplableFilter' => 
  array (
    'type' => 'class',
    'classname' => 'AudioResamplableFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Audio',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Audio\\AudioResamplableFilter',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\Audio\\AudioFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Audio\\CustomFilter' => 
  array (
    'type' => 'class',
    'classname' => 'CustomFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Audio',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Audio\\CustomFilter',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\Audio\\AudioFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Audio\\SimpleFilter' => 
  array (
    'type' => 'class',
    'classname' => 'SimpleFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Audio',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Audio\\SimpleFilter',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\Audio\\AudioFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Concat\\ConcatFilters' => 
  array (
    'type' => 'class',
    'classname' => 'ConcatFilters',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Concat',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Concat\\ConcatFilters',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Filters\\FiltersCollection' => 
  array (
    'type' => 'class',
    'classname' => 'FiltersCollection',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\FiltersCollection',
    'implements' => 
    array (
      0 => 'Countable',
      1 => 'IteratorAggregate',
    ),
  ),
  'FFMpeg\\Filters\\Frame\\CustomFrameFilter' => 
  array (
    'type' => 'class',
    'classname' => 'CustomFrameFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Frame',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Frame\\CustomFrameFilter',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\Frame\\FrameFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Frame\\DisplayRatioFixerFilter' => 
  array (
    'type' => 'class',
    'classname' => 'DisplayRatioFixerFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Frame',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Frame\\DisplayRatioFixerFilter',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\Frame\\FrameFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Frame\\FrameFilters' => 
  array (
    'type' => 'class',
    'classname' => 'FrameFilters',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Frame',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Frame\\FrameFilters',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Filters\\Gif\\GifFilters' => 
  array (
    'type' => 'class',
    'classname' => 'GifFilters',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Gif',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Gif\\GifFilters',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Filters\\Video\\ClipFilter' => 
  array (
    'type' => 'class',
    'classname' => 'ClipFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Video',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Video\\ClipFilter',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\Video\\VideoFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Video\\CropFilter' => 
  array (
    'type' => 'class',
    'classname' => 'CropFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Video',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Video\\CropFilter',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\Video\\VideoFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Video\\CustomFilter' => 
  array (
    'type' => 'class',
    'classname' => 'CustomFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Video',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Video\\CustomFilter',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\Video\\VideoFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Video\\ExtractMultipleFramesFilter' => 
  array (
    'type' => 'class',
    'classname' => 'ExtractMultipleFramesFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Video',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Video\\ExtractMultipleFramesFilter',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\Video\\VideoFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Video\\FrameRateFilter' => 
  array (
    'type' => 'class',
    'classname' => 'FrameRateFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Video',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Video\\FrameRateFilter',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\Video\\VideoFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Video\\PadFilter' => 
  array (
    'type' => 'class',
    'classname' => 'PadFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Video',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Video\\PadFilter',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\Video\\VideoFilterInterface',
      1 => 'FFMpeg\\Filters\\AdvancedMedia\\ComplexCompatibleFilter',
    ),
  ),
  'FFMpeg\\Filters\\Video\\ResizeFilter' => 
  array (
    'type' => 'class',
    'classname' => 'ResizeFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Video',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Video\\ResizeFilter',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\Video\\VideoFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Video\\RotateFilter' => 
  array (
    'type' => 'class',
    'classname' => 'RotateFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Video',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Video\\RotateFilter',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\Video\\VideoFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Video\\SynchronizeFilter' => 
  array (
    'type' => 'class',
    'classname' => 'SynchronizeFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Video',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Video\\SynchronizeFilter',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\Video\\VideoFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Video\\VideoFilters' => 
  array (
    'type' => 'class',
    'classname' => 'VideoFilters',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Video',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Video\\VideoFilters',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Filters\\Video\\WatermarkFilter' => 
  array (
    'type' => 'class',
    'classname' => 'WatermarkFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Video',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Video\\WatermarkFilter',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\Video\\VideoFilterInterface',
      1 => 'FFMpeg\\Filters\\AdvancedMedia\\ComplexCompatibleFilter',
    ),
  ),
  'FFMpeg\\Filters\\Waveform\\WaveformDownmixFilter' => 
  array (
    'type' => 'class',
    'classname' => 'WaveformDownmixFilter',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Waveform',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Waveform\\WaveformDownmixFilter',
    'implements' => 
    array (
      0 => 'FFMpeg\\Filters\\Waveform\\WaveformFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Waveform\\WaveformFilters' => 
  array (
    'type' => 'class',
    'classname' => 'WaveformFilters',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Filters\\Waveform',
    'extends' => 'FluxMedia\\FFMpeg\\Filters\\Waveform\\WaveformFilters',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Format\\Audio\\Aac' => 
  array (
    'type' => 'class',
    'classname' => 'Aac',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Format\\Audio',
    'extends' => 'FluxMedia\\FFMpeg\\Format\\Audio\\Aac',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Format\\Audio\\DefaultAudio' => 
  array (
    'type' => 'class',
    'classname' => 'DefaultAudio',
    'isabstract' => true,
    'namespace' => 'FFMpeg\\Format\\Audio',
    'extends' => 'FluxMedia\\FFMpeg\\Format\\Audio\\DefaultAudio',
    'implements' => 
    array (
      0 => 'FFMpeg\\Format\\AudioInterface',
      1 => 'FFMpeg\\Format\\ProgressableInterface',
    ),
  ),
  'FFMpeg\\Format\\Audio\\Flac' => 
  array (
    'type' => 'class',
    'classname' => 'Flac',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Format\\Audio',
    'extends' => 'FluxMedia\\FFMpeg\\Format\\Audio\\Flac',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Format\\Audio\\Mp3' => 
  array (
    'type' => 'class',
    'classname' => 'Mp3',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Format\\Audio',
    'extends' => 'FluxMedia\\FFMpeg\\Format\\Audio\\Mp3',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Format\\Audio\\Vorbis' => 
  array (
    'type' => 'class',
    'classname' => 'Vorbis',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Format\\Audio',
    'extends' => 'FluxMedia\\FFMpeg\\Format\\Audio\\Vorbis',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Format\\Audio\\Wav' => 
  array (
    'type' => 'class',
    'classname' => 'Wav',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Format\\Audio',
    'extends' => 'FluxMedia\\FFMpeg\\Format\\Audio\\Wav',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Format\\ProgressListener\\AbstractProgressListener' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractProgressListener',
    'isabstract' => true,
    'namespace' => 'FFMpeg\\Format\\ProgressListener',
    'extends' => 'FluxMedia\\FFMpeg\\Format\\ProgressListener\\AbstractProgressListener',
    'implements' => 
    array (
      0 => 'Alchemy\\BinaryDriver\\Listeners\\ListenerInterface',
    ),
  ),
  'FFMpeg\\Format\\ProgressListener\\AudioProgressListener' => 
  array (
    'type' => 'class',
    'classname' => 'AudioProgressListener',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Format\\ProgressListener',
    'extends' => 'FluxMedia\\FFMpeg\\Format\\ProgressListener\\AudioProgressListener',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Format\\ProgressListener\\VideoProgressListener' => 
  array (
    'type' => 'class',
    'classname' => 'VideoProgressListener',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Format\\ProgressListener',
    'extends' => 'FluxMedia\\FFMpeg\\Format\\ProgressListener\\VideoProgressListener',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Format\\Video\\DefaultVideo' => 
  array (
    'type' => 'class',
    'classname' => 'DefaultVideo',
    'isabstract' => true,
    'namespace' => 'FFMpeg\\Format\\Video',
    'extends' => 'FluxMedia\\FFMpeg\\Format\\Video\\DefaultVideo',
    'implements' => 
    array (
      0 => 'FFMpeg\\Format\\VideoInterface',
    ),
  ),
  'FFMpeg\\Format\\Video\\Ogg' => 
  array (
    'type' => 'class',
    'classname' => 'Ogg',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Format\\Video',
    'extends' => 'FluxMedia\\FFMpeg\\Format\\Video\\Ogg',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Format\\Video\\WMV' => 
  array (
    'type' => 'class',
    'classname' => 'WMV',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Format\\Video',
    'extends' => 'FluxMedia\\FFMpeg\\Format\\Video\\WMV',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Format\\Video\\WMV3' => 
  array (
    'type' => 'class',
    'classname' => 'WMV3',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Format\\Video',
    'extends' => 'FluxMedia\\FFMpeg\\Format\\Video\\WMV3',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Format\\Video\\WebM' => 
  array (
    'type' => 'class',
    'classname' => 'WebM',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Format\\Video',
    'extends' => 'FluxMedia\\FFMpeg\\Format\\Video\\WebM',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Format\\Video\\X264' => 
  array (
    'type' => 'class',
    'classname' => 'X264',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Format\\Video',
    'extends' => 'FluxMedia\\FFMpeg\\Format\\Video\\X264',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Media\\AbstractMediaType' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractMediaType',
    'isabstract' => true,
    'namespace' => 'FFMpeg\\Media',
    'extends' => 'FluxMedia\\FFMpeg\\Media\\AbstractMediaType',
    'implements' => 
    array (
      0 => 'FFMpeg\\Media\\MediaTypeInterface',
    ),
  ),
  'FFMpeg\\Media\\AbstractStreamableMedia' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractStreamableMedia',
    'isabstract' => true,
    'namespace' => 'FFMpeg\\Media',
    'extends' => 'FluxMedia\\FFMpeg\\Media\\AbstractStreamableMedia',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Media\\AbstractVideo' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractVideo',
    'isabstract' => true,
    'namespace' => 'FFMpeg\\Media',
    'extends' => 'FluxMedia\\FFMpeg\\Media\\AbstractVideo',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Media\\AdvancedMedia' => 
  array (
    'type' => 'class',
    'classname' => 'AdvancedMedia',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Media',
    'extends' => 'FluxMedia\\FFMpeg\\Media\\AdvancedMedia',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Media\\Audio' => 
  array (
    'type' => 'class',
    'classname' => 'Audio',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Media',
    'extends' => 'FluxMedia\\FFMpeg\\Media\\Audio',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Media\\Clip' => 
  array (
    'type' => 'class',
    'classname' => 'Clip',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Media',
    'extends' => 'FluxMedia\\FFMpeg\\Media\\Clip',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Media\\Concat' => 
  array (
    'type' => 'class',
    'classname' => 'Concat',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Media',
    'extends' => 'FluxMedia\\FFMpeg\\Media\\Concat',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Media\\Frame' => 
  array (
    'type' => 'class',
    'classname' => 'Frame',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Media',
    'extends' => 'FluxMedia\\FFMpeg\\Media\\Frame',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Media\\Gif' => 
  array (
    'type' => 'class',
    'classname' => 'Gif',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Media',
    'extends' => 'FluxMedia\\FFMpeg\\Media\\Gif',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Media\\Video' => 
  array (
    'type' => 'class',
    'classname' => 'Video',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Media',
    'extends' => 'FluxMedia\\FFMpeg\\Media\\Video',
    'implements' => 
    array (
    ),
  ),
  'FFMpeg\\Media\\Waveform' => 
  array (
    'type' => 'class',
    'classname' => 'Waveform',
    'isabstract' => false,
    'namespace' => 'FFMpeg\\Media',
    'extends' => 'FluxMedia\\FFMpeg\\Media\\Waveform',
    'implements' => 
    array (
    ),
  ),
  'Psr\\Log\\AbstractLogger' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractLogger',
    'isabstract' => true,
    'namespace' => 'Psr\\Log',
    'extends' => 'FluxMedia\\Psr\\Log\\AbstractLogger',
    'implements' => 
    array (
      0 => 'Psr\\Log\\LoggerInterface',
    ),
  ),
  'Psr\\Log\\InvalidArgumentException' => 
  array (
    'type' => 'class',
    'classname' => 'InvalidArgumentException',
    'isabstract' => false,
    'namespace' => 'Psr\\Log',
    'extends' => 'FluxMedia\\Psr\\Log\\InvalidArgumentException',
    'implements' => 
    array (
    ),
  ),
  'Psr\\Log\\LogLevel' => 
  array (
    'type' => 'class',
    'classname' => 'LogLevel',
    'isabstract' => false,
    'namespace' => 'Psr\\Log',
    'extends' => 'FluxMedia\\Psr\\Log\\LogLevel',
    'implements' => 
    array (
    ),
  ),
  'Psr\\Log\\NullLogger' => 
  array (
    'type' => 'class',
    'classname' => 'NullLogger',
    'isabstract' => false,
    'namespace' => 'Psr\\Log',
    'extends' => 'FluxMedia\\Psr\\Log\\NullLogger',
    'implements' => 
    array (
    ),
  ),
  'Psr\\Log\\Test\\DummyTest' => 
  array (
    'type' => 'class',
    'classname' => 'DummyTest',
    'isabstract' => false,
    'namespace' => 'Psr\\Log\\Test',
    'extends' => 'FluxMedia\\Psr\\Log\\Test\\DummyTest',
    'implements' => 
    array (
    ),
  ),
  'Psr\\Log\\Test\\LoggerInterfaceTest' => 
  array (
    'type' => 'class',
    'classname' => 'LoggerInterfaceTest',
    'isabstract' => true,
    'namespace' => 'Psr\\Log\\Test',
    'extends' => 'FluxMedia\\Psr\\Log\\Test\\LoggerInterfaceTest',
    'implements' => 
    array (
    ),
  ),
  'Psr\\Log\\Test\\TestLogger' => 
  array (
    'type' => 'class',
    'classname' => 'TestLogger',
    'isabstract' => false,
    'namespace' => 'Psr\\Log\\Test',
    'extends' => 'FluxMedia\\Psr\\Log\\Test\\TestLogger',
    'implements' => 
    array (
    ),
  ),
  'FluxPlugins\\Common\\Account\\AccountIdService' => 
  array (
    'type' => 'class',
    'classname' => 'AccountIdService',
    'isabstract' => false,
    'namespace' => 'FluxPlugins\\Common\\Account',
    'extends' => 'FluxMedia\\FluxPlugins\\Common\\Account\\AccountIdService',
    'implements' => 
    array (
    ),
  ),
  'FluxPlugins\\Common\\Api\\ExternalApiClient' => 
  array (
    'type' => 'class',
    'classname' => 'ExternalApiClient',
    'isabstract' => false,
    'namespace' => 'FluxPlugins\\Common\\Api',
    'extends' => 'FluxMedia\\FluxPlugins\\Common\\Api\\ExternalApiClient',
    'implements' => 
    array (
    ),
  ),
  'FluxPlugins\\Common\\Compatibility\\CompatibilityNoticeHandler' => 
  array (
    'type' => 'class',
    'classname' => 'CompatibilityNoticeHandler',
    'isabstract' => false,
    'namespace' => 'FluxPlugins\\Common\\Compatibility',
    'extends' => 'FluxMedia\\FluxPlugins\\Common\\Compatibility\\CompatibilityNoticeHandler',
    'implements' => 
    array (
    ),
  ),
  'FluxPlugins\\Common\\Compatibility\\CompatibilityResponse' => 
  array (
    'type' => 'class',
    'classname' => 'CompatibilityResponse',
    'isabstract' => false,
    'namespace' => 'FluxPlugins\\Common\\Compatibility',
    'extends' => 'FluxMedia\\FluxPlugins\\Common\\Compatibility\\CompatibilityResponse',
    'implements' => 
    array (
    ),
  ),
  'FluxPlugins\\Common\\Compatibility\\CompatibilityResponseItem' => 
  array (
    'type' => 'class',
    'classname' => 'CompatibilityResponseItem',
    'isabstract' => false,
    'namespace' => 'FluxPlugins\\Common\\Compatibility',
    'extends' => 'FluxMedia\\FluxPlugins\\Common\\Compatibility\\CompatibilityResponseItem',
    'implements' => 
    array (
    ),
  ),
  'FluxPlugins\\Common\\Compatibility\\CompatibilityValidator' => 
  array (
    'type' => 'class',
    'classname' => 'CompatibilityValidator',
    'isabstract' => false,
    'namespace' => 'FluxPlugins\\Common\\Compatibility',
    'extends' => 'FluxMedia\\FluxPlugins\\Common\\Compatibility\\CompatibilityValidator',
    'implements' => 
    array (
    ),
  ),
  'FluxPlugins\\Common\\FluxPlugins' => 
  array (
    'type' => 'class',
    'classname' => 'FluxPlugins',
    'isabstract' => false,
    'namespace' => 'FluxPlugins\\Common',
    'extends' => 'FluxMedia\\FluxPlugins\\Common\\FluxPlugins',
    'implements' => 
    array (
    ),
  ),
  'FluxPlugins\\Common\\Http\\Controllers\\LicenseController' => 
  array (
    'type' => 'class',
    'classname' => 'LicenseController',
    'isabstract' => false,
    'namespace' => 'FluxPlugins\\Common\\Http\\Controllers',
    'extends' => 'FluxMedia\\FluxPlugins\\Common\\Http\\Controllers\\LicenseController',
    'implements' => 
    array (
    ),
  ),
  'FluxPlugins\\Common\\Http\\Controllers\\LogsController' => 
  array (
    'type' => 'class',
    'classname' => 'LogsController',
    'isabstract' => false,
    'namespace' => 'FluxPlugins\\Common\\Http\\Controllers',
    'extends' => 'FluxMedia\\FluxPlugins\\Common\\Http\\Controllers\\LogsController',
    'implements' => 
    array (
    ),
  ),
  'FluxPlugins\\Common\\License\\LicenseService' => 
  array (
    'type' => 'class',
    'classname' => 'LicenseService',
    'isabstract' => false,
    'namespace' => 'FluxPlugins\\Common\\License',
    'extends' => 'FluxMedia\\FluxPlugins\\Common\\License\\LicenseService',
    'implements' => 
    array (
    ),
  ),
  'FluxPlugins\\Common\\Logger\\DatabaseHandler' => 
  array (
    'type' => 'class',
    'classname' => 'DatabaseHandler',
    'isabstract' => false,
    'namespace' => 'FluxPlugins\\Common\\Logger',
    'extends' => 'FluxMedia\\FluxPlugins\\Common\\Logger\\DatabaseHandler',
    'implements' => 
    array (
    ),
  ),
  'FluxPlugins\\Common\\Logger\\Logger' => 
  array (
    'type' => 'class',
    'classname' => 'Logger',
    'isabstract' => false,
    'namespace' => 'FluxPlugins\\Common\\Logger',
    'extends' => 'FluxMedia\\FluxPlugins\\Common\\Logger\\Logger',
    'implements' => 
    array (
    ),
  ),
  'FluxPlugins\\Common\\Services\\CompatibilityService' => 
  array (
    'type' => 'class',
    'classname' => 'CompatibilityService',
    'isabstract' => false,
    'namespace' => 'FluxPlugins\\Common\\Services',
    'extends' => 'FluxMedia\\FluxPlugins\\Common\\Services\\CompatibilityService',
    'implements' => 
    array (
    ),
  ),
  'FluxPlugins\\Common\\Services\\I18n' => 
  array (
    'type' => 'class',
    'classname' => 'I18n',
    'isabstract' => false,
    'namespace' => 'FluxPlugins\\Common\\Services',
    'extends' => 'FluxMedia\\FluxPlugins\\Common\\Services\\I18n',
    'implements' => 
    array (
    ),
  ),
  'FluxPlugins\\Common\\Services\\LogsService' => 
  array (
    'type' => 'class',
    'classname' => 'LogsService',
    'isabstract' => false,
    'namespace' => 'FluxPlugins\\Common\\Services',
    'extends' => 'FluxMedia\\FluxPlugins\\Common\\Services\\LogsService',
    'implements' => 
    array (
    ),
  ),
  'FluxPlugins\\Common\\Services\\MenuService' => 
  array (
    'type' => 'class',
    'classname' => 'MenuService',
    'isabstract' => false,
    'namespace' => 'FluxPlugins\\Common\\Services',
    'extends' => 'FluxMedia\\FluxPlugins\\Common\\Services\\MenuService',
    'implements' => 
    array (
    ),
  ),
  'FluxPlugins\\Common\\Services\\RestApiService' => 
  array (
    'type' => 'class',
    'classname' => 'RestApiService',
    'isabstract' => false,
    'namespace' => 'FluxPlugins\\Common\\Services',
    'extends' => 'FluxMedia\\FluxPlugins\\Common\\Services\\RestApiService',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\AbstractAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractAdapter',
    'isabstract' => true,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\AbstractAdapter',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\Adapter\\AdapterInterface',
      1 => 'Symfony\\Contracts\\Cache\\CacheInterface',
      2 => 'Psr\\Log\\LoggerAwareInterface',
      3 => 'Symfony\\Component\\Cache\\ResettableInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\AbstractTagAwareAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractTagAwareAdapter',
    'isabstract' => true,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\AbstractTagAwareAdapter',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\Adapter\\TagAwareAdapterInterface',
      1 => 'Symfony\\Contracts\\Cache\\TagAwareCacheInterface',
      2 => 'Psr\\Log\\LoggerAwareInterface',
      3 => 'Symfony\\Component\\Cache\\ResettableInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\ApcuAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'ApcuAdapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\ApcuAdapter',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\ArrayAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'ArrayAdapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\ArrayAdapter',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\Adapter\\AdapterInterface',
      1 => 'Symfony\\Contracts\\Cache\\CacheInterface',
      2 => 'Psr\\Log\\LoggerAwareInterface',
      3 => 'Symfony\\Component\\Cache\\ResettableInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\ChainAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'ChainAdapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\ChainAdapter',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\Adapter\\AdapterInterface',
      1 => 'Symfony\\Contracts\\Cache\\CacheInterface',
      2 => 'Symfony\\Component\\Cache\\PruneableInterface',
      3 => 'Symfony\\Component\\Cache\\ResettableInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\CouchbaseBucketAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'CouchbaseBucketAdapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\CouchbaseBucketAdapter',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\CouchbaseCollectionAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'CouchbaseCollectionAdapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\CouchbaseCollectionAdapter',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\DoctrineDbalAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'DoctrineDbalAdapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\DoctrineDbalAdapter',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\PruneableInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\FilesystemAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'FilesystemAdapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\FilesystemAdapter',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\PruneableInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\FilesystemTagAwareAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'FilesystemTagAwareAdapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\FilesystemTagAwareAdapter',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\PruneableInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\MemcachedAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'MemcachedAdapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\MemcachedAdapter',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\NullAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'NullAdapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\NullAdapter',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\Adapter\\AdapterInterface',
      1 => 'Symfony\\Contracts\\Cache\\CacheInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\ParameterNormalizer' => 
  array (
    'type' => 'class',
    'classname' => 'ParameterNormalizer',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\ParameterNormalizer',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\PdoAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'PdoAdapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\PdoAdapter',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\PruneableInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\PhpArrayAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'PhpArrayAdapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\PhpArrayAdapter',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\Adapter\\AdapterInterface',
      1 => 'Symfony\\Contracts\\Cache\\CacheInterface',
      2 => 'Symfony\\Component\\Cache\\PruneableInterface',
      3 => 'Symfony\\Component\\Cache\\ResettableInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\PhpFilesAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'PhpFilesAdapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\PhpFilesAdapter',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\PruneableInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\LazyValue' => 
  array (
    'type' => 'class',
    'classname' => 'LazyValue',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\LazyValue',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\ProxyAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'ProxyAdapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\ProxyAdapter',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\Adapter\\AdapterInterface',
      1 => 'Symfony\\Contracts\\Cache\\CacheInterface',
      2 => 'Symfony\\Component\\Cache\\PruneableInterface',
      3 => 'Symfony\\Component\\Cache\\ResettableInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\Psr16Adapter' => 
  array (
    'type' => 'class',
    'classname' => 'Psr16Adapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\Psr16Adapter',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\PruneableInterface',
      1 => 'Symfony\\Component\\Cache\\ResettableInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\RedisAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'RedisAdapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\RedisAdapter',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\RedisTagAwareAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'RedisTagAwareAdapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\RedisTagAwareAdapter',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\TagAwareAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'TagAwareAdapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\TagAwareAdapter',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\Adapter\\TagAwareAdapterInterface',
      1 => 'Symfony\\Contracts\\Cache\\TagAwareCacheInterface',
      2 => 'Symfony\\Component\\Cache\\PruneableInterface',
      3 => 'Symfony\\Component\\Cache\\ResettableInterface',
      4 => 'Psr\\Log\\LoggerAwareInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\TraceableAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'TraceableAdapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\TraceableAdapter',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\Adapter\\AdapterInterface',
      1 => 'Symfony\\Contracts\\Cache\\CacheInterface',
      2 => 'Symfony\\Component\\Cache\\PruneableInterface',
      3 => 'Symfony\\Component\\Cache\\ResettableInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\TraceableAdapterEvent' => 
  array (
    'type' => 'class',
    'classname' => 'TraceableAdapterEvent',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\TraceableAdapterEvent',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\TraceableTagAwareAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'TraceableTagAwareAdapter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\TraceableTagAwareAdapter',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\Adapter\\TagAwareAdapterInterface',
      1 => 'Symfony\\Contracts\\Cache\\TagAwareCacheInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\CacheItem' => 
  array (
    'type' => 'class',
    'classname' => 'CacheItem',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\CacheItem',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\Cache\\ItemInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\DataCollector\\CacheDataCollector' => 
  array (
    'type' => 'class',
    'classname' => 'CacheDataCollector',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\DataCollector',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\DataCollector\\CacheDataCollector',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpKernel\\DataCollector\\LateDataCollectorInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\DependencyInjection\\CacheCollectorPass' => 
  array (
    'type' => 'class',
    'classname' => 'CacheCollectorPass',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\DependencyInjection',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\DependencyInjection\\CacheCollectorPass',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\DependencyInjection\\Compiler\\CompilerPassInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\DependencyInjection\\CachePoolClearerPass' => 
  array (
    'type' => 'class',
    'classname' => 'CachePoolClearerPass',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\DependencyInjection',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\DependencyInjection\\CachePoolClearerPass',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\DependencyInjection\\Compiler\\CompilerPassInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\DependencyInjection\\CachePoolPass' => 
  array (
    'type' => 'class',
    'classname' => 'CachePoolPass',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\DependencyInjection',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\DependencyInjection\\CachePoolPass',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\DependencyInjection\\Compiler\\CompilerPassInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\DependencyInjection\\CachePoolPrunerPass' => 
  array (
    'type' => 'class',
    'classname' => 'CachePoolPrunerPass',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\DependencyInjection',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\DependencyInjection\\CachePoolPrunerPass',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\DependencyInjection\\Compiler\\CompilerPassInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Exception\\CacheException' => 
  array (
    'type' => 'class',
    'classname' => 'CacheException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Exception',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Exception\\CacheException',
    'implements' => 
    array (
      0 => 'Psr\\Cache\\CacheException',
    ),
  ),
  'Symfony\\Component\\Cache\\Exception\\InvalidArgumentException' => 
  array (
    'type' => 'class',
    'classname' => 'InvalidArgumentException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Exception',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Exception\\InvalidArgumentException',
    'implements' => 
    array (
      0 => 'Psr\\Cache\\InvalidArgumentException',
    ),
  ),
  'Symfony\\Component\\Cache\\Exception\\LogicException' => 
  array (
    'type' => 'class',
    'classname' => 'LogicException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Exception',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Exception\\LogicException',
    'implements' => 
    array (
      0 => 'Psr\\Cache\\CacheException',
    ),
  ),
  'Symfony\\Component\\Cache\\LockRegistry' => 
  array (
    'type' => 'class',
    'classname' => 'LockRegistry',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\LockRegistry',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Cache\\Marshaller\\DefaultMarshaller' => 
  array (
    'type' => 'class',
    'classname' => 'DefaultMarshaller',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Marshaller',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Marshaller\\DefaultMarshaller',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\Marshaller\\MarshallerInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Marshaller\\DeflateMarshaller' => 
  array (
    'type' => 'class',
    'classname' => 'DeflateMarshaller',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Marshaller',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Marshaller\\DeflateMarshaller',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\Marshaller\\MarshallerInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Marshaller\\SodiumMarshaller' => 
  array (
    'type' => 'class',
    'classname' => 'SodiumMarshaller',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Marshaller',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Marshaller\\SodiumMarshaller',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\Marshaller\\MarshallerInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Marshaller\\TagAwareMarshaller' => 
  array (
    'type' => 'class',
    'classname' => 'TagAwareMarshaller',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Marshaller',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Marshaller\\TagAwareMarshaller',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\Marshaller\\MarshallerInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Messenger\\EarlyExpirationDispatcher' => 
  array (
    'type' => 'class',
    'classname' => 'EarlyExpirationDispatcher',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Messenger',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Messenger\\EarlyExpirationDispatcher',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Cache\\Messenger\\EarlyExpirationHandler' => 
  array (
    'type' => 'class',
    'classname' => 'EarlyExpirationHandler',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Messenger',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Messenger\\EarlyExpirationHandler',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Cache\\Messenger\\EarlyExpirationMessage' => 
  array (
    'type' => 'class',
    'classname' => 'EarlyExpirationMessage',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Messenger',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Messenger\\EarlyExpirationMessage',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Cache\\Psr16Cache' => 
  array (
    'type' => 'class',
    'classname' => 'Psr16Cache',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Psr16Cache',
    'implements' => 
    array (
      0 => 'Psr\\SimpleCache\\CacheInterface',
      1 => 'Symfony\\Component\\Cache\\PruneableInterface',
      2 => 'Symfony\\Component\\Cache\\ResettableInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Redis5Proxy' => 
  array (
    'type' => 'class',
    'classname' => 'Redis5Proxy',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Redis5Proxy',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\Service\\ResetInterface',
      1 => 'Symfony\\Component\\VarExporter\\LazyObjectInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Redis6Proxy' => 
  array (
    'type' => 'class',
    'classname' => 'Redis6Proxy',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Redis6Proxy',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\Service\\ResetInterface',
      1 => 'Symfony\\Component\\VarExporter\\LazyObjectInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\RedisCluster5Proxy' => 
  array (
    'type' => 'class',
    'classname' => 'RedisCluster5Proxy',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\RedisCluster5Proxy',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\Service\\ResetInterface',
      1 => 'Symfony\\Component\\VarExporter\\LazyObjectInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\RedisCluster6Proxy' => 
  array (
    'type' => 'class',
    'classname' => 'RedisCluster6Proxy',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\RedisCluster6Proxy',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\Service\\ResetInterface',
      1 => 'Symfony\\Component\\VarExporter\\LazyObjectInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\RedisClusterNodeProxy' => 
  array (
    'type' => 'class',
    'classname' => 'RedisClusterNodeProxy',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\RedisClusterNodeProxy',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\RedisClusterProxy' => 
  array (
    'type' => 'class',
    'classname' => 'RedisClusterProxy',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\RedisClusterProxy',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\RedisProxy' => 
  array (
    'type' => 'class',
    'classname' => 'RedisProxy',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\RedisProxy',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\RelayProxy' => 
  array (
    'type' => 'class',
    'classname' => 'RelayProxy',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'extends' => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\RelayProxy',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\Service\\ResetInterface',
      1 => 'Symfony\\Component\\VarExporter\\LazyObjectInterface',
    ),
  ),
  '©' => 
  array (
    'type' => 'class',
    'classname' => '©',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'FluxMedia_©',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Filesystem\\Exception\\FileNotFoundException' => 
  array (
    'type' => 'class',
    'classname' => 'FileNotFoundException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Filesystem\\Exception',
    'extends' => 'FluxMedia\\Symfony\\Component\\Filesystem\\Exception\\FileNotFoundException',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Filesystem\\Exception\\IOException' => 
  array (
    'type' => 'class',
    'classname' => 'IOException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Filesystem\\Exception',
    'extends' => 'FluxMedia\\Symfony\\Component\\Filesystem\\Exception\\IOException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Filesystem\\Exception\\IOExceptionInterface',
    ),
  ),
  'Symfony\\Component\\Filesystem\\Exception\\InvalidArgumentException' => 
  array (
    'type' => 'class',
    'classname' => 'InvalidArgumentException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Filesystem\\Exception',
    'extends' => 'FluxMedia\\Symfony\\Component\\Filesystem\\Exception\\InvalidArgumentException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Filesystem\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\Filesystem\\Exception\\RuntimeException' => 
  array (
    'type' => 'class',
    'classname' => 'RuntimeException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Filesystem\\Exception',
    'extends' => 'FluxMedia\\Symfony\\Component\\Filesystem\\Exception\\RuntimeException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Filesystem\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\Filesystem\\Filesystem' => 
  array (
    'type' => 'class',
    'classname' => 'Filesystem',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Filesystem',
    'extends' => 'FluxMedia\\Symfony\\Component\\Filesystem\\Filesystem',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Filesystem\\Path' => 
  array (
    'type' => 'class',
    'classname' => 'Path',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Filesystem',
    'extends' => 'FluxMedia\\Symfony\\Component\\Filesystem\\Path',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Polyfill\\Ctype\\Ctype' => 
  array (
    'type' => 'class',
    'classname' => 'Ctype',
    'isabstract' => false,
    'namespace' => 'Symfony\\Polyfill\\Ctype',
    'extends' => 'FluxMedia\\Symfony\\Polyfill\\Ctype\\Ctype',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Polyfill\\Mbstring\\Mbstring' => 
  array (
    'type' => 'class',
    'classname' => 'Mbstring',
    'isabstract' => false,
    'namespace' => 'Symfony\\Polyfill\\Mbstring',
    'extends' => 'FluxMedia\\Symfony\\Polyfill\\Mbstring\\Mbstring',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Polyfill\\Php80\\Php80' => 
  array (
    'type' => 'class',
    'classname' => 'Php80',
    'isabstract' => false,
    'namespace' => 'Symfony\\Polyfill\\Php80',
    'extends' => 'FluxMedia\\Symfony\\Polyfill\\Php80\\Php80',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Polyfill\\Php80\\PhpToken' => 
  array (
    'type' => 'class',
    'classname' => 'PhpToken',
    'isabstract' => false,
    'namespace' => 'Symfony\\Polyfill\\Php80',
    'extends' => 'FluxMedia\\Symfony\\Polyfill\\Php80\\PhpToken',
    'implements' => 
    array (
      0 => 'Stringable',
    ),
  ),
  'Symfony\\Component\\Process\\Exception\\InvalidArgumentException' => 
  array (
    'type' => 'class',
    'classname' => 'InvalidArgumentException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Process\\Exception',
    'extends' => 'FluxMedia\\Symfony\\Component\\Process\\Exception\\InvalidArgumentException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Process\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\Process\\Exception\\LogicException' => 
  array (
    'type' => 'class',
    'classname' => 'LogicException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Process\\Exception',
    'extends' => 'FluxMedia\\Symfony\\Component\\Process\\Exception\\LogicException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Process\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\Process\\Exception\\ProcessFailedException' => 
  array (
    'type' => 'class',
    'classname' => 'ProcessFailedException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Process\\Exception',
    'extends' => 'FluxMedia\\Symfony\\Component\\Process\\Exception\\ProcessFailedException',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Process\\Exception\\ProcessSignaledException' => 
  array (
    'type' => 'class',
    'classname' => 'ProcessSignaledException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Process\\Exception',
    'extends' => 'FluxMedia\\Symfony\\Component\\Process\\Exception\\ProcessSignaledException',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Process\\Exception\\ProcessTimedOutException' => 
  array (
    'type' => 'class',
    'classname' => 'ProcessTimedOutException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Process\\Exception',
    'extends' => 'FluxMedia\\Symfony\\Component\\Process\\Exception\\ProcessTimedOutException',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Process\\Exception\\RuntimeException' => 
  array (
    'type' => 'class',
    'classname' => 'RuntimeException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Process\\Exception',
    'extends' => 'FluxMedia\\Symfony\\Component\\Process\\Exception\\RuntimeException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Process\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\Process\\ExecutableFinder' => 
  array (
    'type' => 'class',
    'classname' => 'ExecutableFinder',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Process',
    'extends' => 'FluxMedia\\Symfony\\Component\\Process\\ExecutableFinder',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Process\\InputStream' => 
  array (
    'type' => 'class',
    'classname' => 'InputStream',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Process',
    'extends' => 'FluxMedia\\Symfony\\Component\\Process\\InputStream',
    'implements' => 
    array (
      0 => 'IteratorAggregate',
    ),
  ),
  'Symfony\\Component\\Process\\PhpExecutableFinder' => 
  array (
    'type' => 'class',
    'classname' => 'PhpExecutableFinder',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Process',
    'extends' => 'FluxMedia\\Symfony\\Component\\Process\\PhpExecutableFinder',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Process\\PhpProcess' => 
  array (
    'type' => 'class',
    'classname' => 'PhpProcess',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Process',
    'extends' => 'FluxMedia\\Symfony\\Component\\Process\\PhpProcess',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Process\\Pipes\\AbstractPipes' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractPipes',
    'isabstract' => true,
    'namespace' => 'Symfony\\Component\\Process\\Pipes',
    'extends' => 'FluxMedia\\Symfony\\Component\\Process\\Pipes\\AbstractPipes',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Process\\Pipes\\PipesInterface',
    ),
  ),
  'Symfony\\Component\\Process\\Pipes\\UnixPipes' => 
  array (
    'type' => 'class',
    'classname' => 'UnixPipes',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Process\\Pipes',
    'extends' => 'FluxMedia\\Symfony\\Component\\Process\\Pipes\\UnixPipes',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Process\\Pipes\\WindowsPipes' => 
  array (
    'type' => 'class',
    'classname' => 'WindowsPipes',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Process\\Pipes',
    'extends' => 'FluxMedia\\Symfony\\Component\\Process\\Pipes\\WindowsPipes',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Process\\Process' => 
  array (
    'type' => 'class',
    'classname' => 'Process',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Process',
    'extends' => 'FluxMedia\\Symfony\\Component\\Process\\Process',
    'implements' => 
    array (
      0 => 'IteratorAggregate',
    ),
  ),
  'Symfony\\Component\\Process\\ProcessUtils' => 
  array (
    'type' => 'class',
    'classname' => 'ProcessUtils',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Process',
    'extends' => 'FluxMedia\\Symfony\\Component\\Process\\ProcessUtils',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Contracts\\Service\\Attribute\\Required' => 
  array (
    'type' => 'class',
    'classname' => 'Required',
    'isabstract' => false,
    'namespace' => 'Symfony\\Contracts\\Service\\Attribute',
    'extends' => 'FluxMedia\\Symfony\\Contracts\\Service\\Attribute\\Required',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Contracts\\Service\\Attribute\\SubscribedService' => 
  array (
    'type' => 'class',
    'classname' => 'SubscribedService',
    'isabstract' => false,
    'namespace' => 'Symfony\\Contracts\\Service\\Attribute',
    'extends' => 'FluxMedia\\Symfony\\Contracts\\Service\\Attribute\\SubscribedService',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Contracts\\Service\\Test\\ServiceLocatorTest' => 
  array (
    'type' => 'class',
    'classname' => 'ServiceLocatorTest',
    'isabstract' => false,
    'namespace' => 'Symfony\\Contracts\\Service\\Test',
    'extends' => 'FluxMedia\\Symfony\\Contracts\\Service\\Test\\ServiceLocatorTest',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Contracts\\Service\\Test\\ServiceLocatorTestCase' => 
  array (
    'type' => 'class',
    'classname' => 'ServiceLocatorTestCase',
    'isabstract' => true,
    'namespace' => 'Symfony\\Contracts\\Service\\Test',
    'extends' => 'FluxMedia\\Symfony\\Contracts\\Service\\Test\\ServiceLocatorTestCase',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\VarExporter\\Exception\\ClassNotFoundException' => 
  array (
    'type' => 'class',
    'classname' => 'ClassNotFoundException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\VarExporter\\Exception',
    'extends' => 'FluxMedia\\Symfony\\Component\\VarExporter\\Exception\\ClassNotFoundException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\VarExporter\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\VarExporter\\Exception\\LogicException' => 
  array (
    'type' => 'class',
    'classname' => 'LogicException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\VarExporter\\Exception',
    'extends' => 'FluxMedia\\Symfony\\Component\\VarExporter\\Exception\\LogicException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\VarExporter\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\VarExporter\\Exception\\NotInstantiableTypeException' => 
  array (
    'type' => 'class',
    'classname' => 'NotInstantiableTypeException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\VarExporter\\Exception',
    'extends' => 'FluxMedia\\Symfony\\Component\\VarExporter\\Exception\\NotInstantiableTypeException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\VarExporter\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\VarExporter\\Hydrator' => 
  array (
    'type' => 'class',
    'classname' => 'Hydrator',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\VarExporter',
    'extends' => 'FluxMedia\\Symfony\\Component\\VarExporter\\Hydrator',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\VarExporter\\Instantiator' => 
  array (
    'type' => 'class',
    'classname' => 'Instantiator',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\VarExporter',
    'extends' => 'FluxMedia\\Symfony\\Component\\VarExporter\\Instantiator',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\VarExporter\\Internal\\Exporter' => 
  array (
    'type' => 'class',
    'classname' => 'Exporter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\VarExporter\\Internal',
    'extends' => 'FluxMedia\\Symfony\\Component\\VarExporter\\Internal\\Exporter',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\VarExporter\\Internal\\Hydrator' => 
  array (
    'type' => 'class',
    'classname' => 'Hydrator',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\VarExporter\\Internal',
    'extends' => 'FluxMedia\\Symfony\\Component\\VarExporter\\Internal\\Hydrator',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\VarExporter\\Internal\\LazyObjectRegistry' => 
  array (
    'type' => 'class',
    'classname' => 'LazyObjectRegistry',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\VarExporter\\Internal',
    'extends' => 'FluxMedia\\Symfony\\Component\\VarExporter\\Internal\\LazyObjectRegistry',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\VarExporter\\Internal\\LazyObjectState' => 
  array (
    'type' => 'class',
    'classname' => 'LazyObjectState',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\VarExporter\\Internal',
    'extends' => 'FluxMedia\\Symfony\\Component\\VarExporter\\Internal\\LazyObjectState',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\VarExporter\\Internal\\Reference' => 
  array (
    'type' => 'class',
    'classname' => 'Reference',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\VarExporter\\Internal',
    'extends' => 'FluxMedia\\Symfony\\Component\\VarExporter\\Internal\\Reference',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\VarExporter\\Internal\\Registry' => 
  array (
    'type' => 'class',
    'classname' => 'Registry',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\VarExporter\\Internal',
    'extends' => 'FluxMedia\\Symfony\\Component\\VarExporter\\Internal\\Registry',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\VarExporter\\Internal\\Values' => 
  array (
    'type' => 'class',
    'classname' => 'Values',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\VarExporter\\Internal',
    'extends' => 'FluxMedia\\Symfony\\Component\\VarExporter\\Internal\\Values',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\VarExporter\\ProxyHelper' => 
  array (
    'type' => 'class',
    'classname' => 'ProxyHelper',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\VarExporter',
    'extends' => 'FluxMedia\\Symfony\\Component\\VarExporter\\ProxyHelper',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\VarExporter\\VarExporter' => 
  array (
    'type' => 'class',
    'classname' => 'VarExporter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\VarExporter',
    'extends' => 'FluxMedia\\Symfony\\Component\\VarExporter\\VarExporter',
    'implements' => 
    array (
    ),
  ),
  'Evenement\\EventEmitterTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'EventEmitterTrait',
    'namespace' => 'Evenement',
    'use' => 
    array (
      0 => 'FluxMedia\\Evenement\\EventEmitterTrait',
    ),
  ),
  'Psr\\Log\\LoggerAwareTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'LoggerAwareTrait',
    'namespace' => 'Psr\\Log',
    'use' => 
    array (
      0 => 'FluxMedia\\Psr\\Log\\LoggerAwareTrait',
    ),
  ),
  'Psr\\Log\\LoggerTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'LoggerTrait',
    'namespace' => 'Psr\\Log',
    'use' => 
    array (
      0 => 'FluxMedia\\Psr\\Log\\LoggerTrait',
    ),
  ),
  'Symfony\\Contracts\\Cache\\CacheTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'CacheTrait',
    'namespace' => 'Symfony\\Contracts\\Cache',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Contracts\\Cache\\CacheTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\AbstractAdapterTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'AbstractAdapterTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\AbstractAdapterTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\ContractsTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'ContractsTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\ContractsTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\FilesystemCommonTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'FilesystemCommonTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\FilesystemCommonTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\FilesystemTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'FilesystemTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\FilesystemTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\ProxyTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'ProxyTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\ProxyTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Redis61ProxyTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'Redis61ProxyTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Redis61ProxyTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Redis62ProxyTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'Redis62ProxyTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Redis62ProxyTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Redis63ProxyTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'Redis63ProxyTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Redis63ProxyTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\RedisCluster61ProxyTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'RedisCluster61ProxyTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\RedisCluster61ProxyTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\RedisCluster62ProxyTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'RedisCluster62ProxyTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\RedisCluster62ProxyTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\RedisCluster63ProxyTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'RedisCluster63ProxyTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\RedisCluster63ProxyTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\RedisTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'RedisTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\RedisTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\BgsaveTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'BgsaveTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\BgsaveTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\CopyTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'CopyTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\CopyTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\FtTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'FtTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\FtTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\GeosearchTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'GeosearchTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\GeosearchTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\GetWithMetaTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'GetWithMetaTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\GetWithMetaTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\GetrangeTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'GetrangeTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\GetrangeTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\HsetTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'HsetTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\HsetTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\IsTrackedTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'IsTrackedTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\IsTrackedTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\MoveTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'MoveTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\MoveTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\NullableReturnTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'NullableReturnTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\NullableReturnTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\PfcountTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'PfcountTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\PfcountTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\Relay11Trait' => 
  array (
    'type' => 'trait',
    'traitname' => 'Relay11Trait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\Relay11Trait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\Relay121Trait' => 
  array (
    'type' => 'trait',
    'traitname' => 'Relay121Trait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\Relay121Trait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\Relay12Trait' => 
  array (
    'type' => 'trait',
    'traitname' => 'Relay12Trait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\Relay12Trait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\Relay20Trait' => 
  array (
    'type' => 'trait',
    'traitname' => 'Relay20Trait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\Relay20Trait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\Relay21Trait' => 
  array (
    'type' => 'trait',
    'traitname' => 'Relay21Trait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\Relay21Trait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\Relay22Trait' => 
  array (
    'type' => 'trait',
    'traitname' => 'Relay22Trait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\Relay22Trait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\Relay30Trait' => 
  array (
    'type' => 'trait',
    'traitname' => 'Relay30Trait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\Relay30Trait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\Relay40Trait' => 
  array (
    'type' => 'trait',
    'traitname' => 'Relay40Trait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\Relay40Trait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\Relay\\SwapdbTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'SwapdbTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits\\Relay',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\Relay\\SwapdbTrait',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\RelayProxyTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'RelayProxyTrait',
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\RelayProxyTrait',
    ),
  ),
  'Symfony\\Contracts\\Service\\ServiceLocatorTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'ServiceLocatorTrait',
    'namespace' => 'Symfony\\Contracts\\Service',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Contracts\\Service\\ServiceLocatorTrait',
    ),
  ),
  'Symfony\\Contracts\\Service\\ServiceMethodsSubscriberTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'ServiceMethodsSubscriberTrait',
    'namespace' => 'Symfony\\Contracts\\Service',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Contracts\\Service\\ServiceMethodsSubscriberTrait',
    ),
  ),
  'Symfony\\Contracts\\Service\\ServiceSubscriberTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'ServiceSubscriberTrait',
    'namespace' => 'Symfony\\Contracts\\Service',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Contracts\\Service\\ServiceSubscriberTrait',
    ),
  ),
  'Symfony\\Component\\VarExporter\\Internal\\LazyObjectTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'LazyObjectTrait',
    'namespace' => 'Symfony\\Component\\VarExporter\\Internal',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\VarExporter\\Internal\\LazyObjectTrait',
    ),
  ),
  'Symfony\\Component\\VarExporter\\LazyGhostTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'LazyGhostTrait',
    'namespace' => 'Symfony\\Component\\VarExporter',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\VarExporter\\LazyGhostTrait',
    ),
  ),
  'Symfony\\Component\\VarExporter\\LazyProxyTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'LazyProxyTrait',
    'namespace' => 'Symfony\\Component\\VarExporter',
    'use' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\VarExporter\\LazyProxyTrait',
    ),
  ),
  'Alchemy\\BinaryDriver\\BinaryInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'BinaryInterface',
    'namespace' => 'Alchemy\\BinaryDriver',
    'extends' => 
    array (
      0 => 'FluxMedia\\Alchemy\\BinaryDriver\\BinaryInterface',
    ),
  ),
  'Alchemy\\BinaryDriver\\ConfigurationAwareInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ConfigurationAwareInterface',
    'namespace' => 'Alchemy\\BinaryDriver',
    'extends' => 
    array (
      0 => 'FluxMedia\\Alchemy\\BinaryDriver\\ConfigurationAwareInterface',
    ),
  ),
  'Alchemy\\BinaryDriver\\ConfigurationInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ConfigurationInterface',
    'namespace' => 'Alchemy\\BinaryDriver',
    'extends' => 
    array (
      0 => 'FluxMedia\\Alchemy\\BinaryDriver\\ConfigurationInterface',
    ),
  ),
  'Alchemy\\BinaryDriver\\Exception\\ExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ExceptionInterface',
    'namespace' => 'Alchemy\\BinaryDriver\\Exception',
    'extends' => 
    array (
      0 => 'FluxMedia\\Alchemy\\BinaryDriver\\Exception\\ExceptionInterface',
    ),
  ),
  'Alchemy\\BinaryDriver\\Listeners\\ListenerInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ListenerInterface',
    'namespace' => 'Alchemy\\BinaryDriver\\Listeners',
    'extends' => 
    array (
      0 => 'FluxMedia\\Alchemy\\BinaryDriver\\Listeners\\ListenerInterface',
    ),
  ),
  'Alchemy\\BinaryDriver\\ProcessBuilderFactoryAwareInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ProcessBuilderFactoryAwareInterface',
    'namespace' => 'Alchemy\\BinaryDriver',
    'extends' => 
    array (
      0 => 'FluxMedia\\Alchemy\\BinaryDriver\\ProcessBuilderFactoryAwareInterface',
    ),
  ),
  'Alchemy\\BinaryDriver\\ProcessBuilderFactoryInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ProcessBuilderFactoryInterface',
    'namespace' => 'Alchemy\\BinaryDriver',
    'extends' => 
    array (
      0 => 'FluxMedia\\Alchemy\\BinaryDriver\\ProcessBuilderFactoryInterface',
    ),
  ),
  'Alchemy\\BinaryDriver\\ProcessRunnerAwareInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ProcessRunnerAwareInterface',
    'namespace' => 'Alchemy\\BinaryDriver',
    'extends' => 
    array (
      0 => 'FluxMedia\\Alchemy\\BinaryDriver\\ProcessRunnerAwareInterface',
    ),
  ),
  'Alchemy\\BinaryDriver\\ProcessRunnerInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ProcessRunnerInterface',
    'namespace' => 'Alchemy\\BinaryDriver',
    'extends' => 
    array (
      0 => 'FluxMedia\\Alchemy\\BinaryDriver\\ProcessRunnerInterface',
    ),
  ),
  'Evenement\\EventEmitterInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'EventEmitterInterface',
    'namespace' => 'Evenement',
    'extends' => 
    array (
      0 => 'FluxMedia\\Evenement\\EventEmitterInterface',
    ),
  ),
  'Neutron\\TemporaryFilesystem\\TemporaryFilesystemInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'TemporaryFilesystemInterface',
    'namespace' => 'Neutron\\TemporaryFilesystem',
    'extends' => 
    array (
      0 => 'FluxMedia\\Neutron\\TemporaryFilesystem\\TemporaryFilesystemInterface',
    ),
  ),
  'FFMpeg\\Exception\\ExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ExceptionInterface',
    'namespace' => 'FFMpeg\\Exception',
    'extends' => 
    array (
      0 => 'FluxMedia\\FFMpeg\\Exception\\ExceptionInterface',
    ),
  ),
  'FFMpeg\\FFProbe\\MapperInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'MapperInterface',
    'namespace' => 'FFMpeg\\FFProbe',
    'extends' => 
    array (
      0 => 'FluxMedia\\FFMpeg\\FFProbe\\MapperInterface',
    ),
  ),
  'FFMpeg\\FFProbe\\OptionsTesterInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'OptionsTesterInterface',
    'namespace' => 'FFMpeg\\FFProbe',
    'extends' => 
    array (
      0 => 'FluxMedia\\FFMpeg\\FFProbe\\OptionsTesterInterface',
    ),
  ),
  'FFMpeg\\FFProbe\\OutputParserInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'OutputParserInterface',
    'namespace' => 'FFMpeg\\FFProbe',
    'extends' => 
    array (
      0 => 'FluxMedia\\FFMpeg\\FFProbe\\OutputParserInterface',
    ),
  ),
  'FFMpeg\\Filters\\AdvancedMedia\\ComplexCompatibleFilter' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ComplexCompatibleFilter',
    'namespace' => 'FFMpeg\\Filters\\AdvancedMedia',
    'extends' => 
    array (
      0 => 'FluxMedia\\FFMpeg\\Filters\\AdvancedMedia\\ComplexCompatibleFilter',
    ),
  ),
  'FFMpeg\\Filters\\AdvancedMedia\\ComplexFilterInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ComplexFilterInterface',
    'namespace' => 'FFMpeg\\Filters\\AdvancedMedia',
    'extends' => 
    array (
      0 => 'FluxMedia\\FFMpeg\\Filters\\AdvancedMedia\\ComplexFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Audio\\AudioFilterInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'AudioFilterInterface',
    'namespace' => 'FFMpeg\\Filters\\Audio',
    'extends' => 
    array (
      0 => 'FluxMedia\\FFMpeg\\Filters\\Audio\\AudioFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Concat\\ConcatFilterInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ConcatFilterInterface',
    'namespace' => 'FFMpeg\\Filters\\Concat',
    'extends' => 
    array (
      0 => 'FluxMedia\\FFMpeg\\Filters\\Concat\\ConcatFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\FilterInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'FilterInterface',
    'namespace' => 'FFMpeg\\Filters',
    'extends' => 
    array (
      0 => 'FluxMedia\\FFMpeg\\Filters\\FilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Frame\\FrameFilterInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'FrameFilterInterface',
    'namespace' => 'FFMpeg\\Filters\\Frame',
    'extends' => 
    array (
      0 => 'FluxMedia\\FFMpeg\\Filters\\Frame\\FrameFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Gif\\GifFilterInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'GifFilterInterface',
    'namespace' => 'FFMpeg\\Filters\\Gif',
    'extends' => 
    array (
      0 => 'FluxMedia\\FFMpeg\\Filters\\Gif\\GifFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Video\\VideoFilterInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'VideoFilterInterface',
    'namespace' => 'FFMpeg\\Filters\\Video',
    'extends' => 
    array (
      0 => 'FluxMedia\\FFMpeg\\Filters\\Video\\VideoFilterInterface',
    ),
  ),
  'FFMpeg\\Filters\\Waveform\\WaveformFilterInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'WaveformFilterInterface',
    'namespace' => 'FFMpeg\\Filters\\Waveform',
    'extends' => 
    array (
      0 => 'FluxMedia\\FFMpeg\\Filters\\Waveform\\WaveformFilterInterface',
    ),
  ),
  'FFMpeg\\Format\\AudioInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'AudioInterface',
    'namespace' => 'FFMpeg\\Format',
    'extends' => 
    array (
      0 => 'FluxMedia\\FFMpeg\\Format\\AudioInterface',
    ),
  ),
  'FFMpeg\\Format\\FormatInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'FormatInterface',
    'namespace' => 'FFMpeg\\Format',
    'extends' => 
    array (
      0 => 'FluxMedia\\FFMpeg\\Format\\FormatInterface',
    ),
  ),
  'FFMpeg\\Format\\FrameInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'FrameInterface',
    'namespace' => 'FFMpeg\\Format',
    'extends' => 
    array (
      0 => 'FluxMedia\\FFMpeg\\Format\\FrameInterface',
    ),
  ),
  'FFMpeg\\Format\\ProgressableInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ProgressableInterface',
    'namespace' => 'FFMpeg\\Format',
    'extends' => 
    array (
      0 => 'FluxMedia\\FFMpeg\\Format\\ProgressableInterface',
    ),
  ),
  'FFMpeg\\Format\\VideoInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'VideoInterface',
    'namespace' => 'FFMpeg\\Format',
    'extends' => 
    array (
      0 => 'FluxMedia\\FFMpeg\\Format\\VideoInterface',
    ),
  ),
  'FFMpeg\\Media\\MediaTypeInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'MediaTypeInterface',
    'namespace' => 'FFMpeg\\Media',
    'extends' => 
    array (
      0 => 'FluxMedia\\FFMpeg\\Media\\MediaTypeInterface',
    ),
  ),
  'Psr\\Cache\\CacheException' => 
  array (
    'type' => 'interface',
    'interfacename' => 'CacheException',
    'namespace' => 'Psr\\Cache',
    'extends' => 
    array (
      0 => 'FluxMedia\\Psr\\Cache\\CacheException',
    ),
  ),
  'Psr\\Cache\\CacheItemInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'CacheItemInterface',
    'namespace' => 'Psr\\Cache',
    'extends' => 
    array (
      0 => 'FluxMedia\\Psr\\Cache\\CacheItemInterface',
    ),
  ),
  'Psr\\Cache\\CacheItemPoolInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'CacheItemPoolInterface',
    'namespace' => 'Psr\\Cache',
    'extends' => 
    array (
      0 => 'FluxMedia\\Psr\\Cache\\CacheItemPoolInterface',
    ),
  ),
  'Psr\\Cache\\InvalidArgumentException' => 
  array (
    'type' => 'interface',
    'interfacename' => 'InvalidArgumentException',
    'namespace' => 'Psr\\Cache',
    'extends' => 
    array (
      0 => 'FluxMedia\\Psr\\Cache\\InvalidArgumentException',
    ),
  ),
  'Psr\\Container\\ContainerExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ContainerExceptionInterface',
    'namespace' => 'Psr\\Container',
    'extends' => 
    array (
      0 => 'FluxMedia\\Psr\\Container\\ContainerExceptionInterface',
    ),
  ),
  'Psr\\Container\\ContainerInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ContainerInterface',
    'namespace' => 'Psr\\Container',
    'extends' => 
    array (
      0 => 'FluxMedia\\Psr\\Container\\ContainerInterface',
    ),
  ),
  'Psr\\Container\\NotFoundExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'NotFoundExceptionInterface',
    'namespace' => 'Psr\\Container',
    'extends' => 
    array (
      0 => 'FluxMedia\\Psr\\Container\\NotFoundExceptionInterface',
    ),
  ),
  'Psr\\Log\\LoggerAwareInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'LoggerAwareInterface',
    'namespace' => 'Psr\\Log',
    'extends' => 
    array (
      0 => 'FluxMedia\\Psr\\Log\\LoggerAwareInterface',
    ),
  ),
  'Psr\\Log\\LoggerInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'LoggerInterface',
    'namespace' => 'Psr\\Log',
    'extends' => 
    array (
      0 => 'FluxMedia\\Psr\\Log\\LoggerInterface',
    ),
  ),
  'Symfony\\Contracts\\Cache\\CacheInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'CacheInterface',
    'namespace' => 'Symfony\\Contracts\\Cache',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Contracts\\Cache\\CacheInterface',
    ),
  ),
  'Symfony\\Contracts\\Cache\\CallbackInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'CallbackInterface',
    'namespace' => 'Symfony\\Contracts\\Cache',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Contracts\\Cache\\CallbackInterface',
    ),
  ),
  'Symfony\\Contracts\\Cache\\ItemInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ItemInterface',
    'namespace' => 'Symfony\\Contracts\\Cache',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Contracts\\Cache\\ItemInterface',
    ),
  ),
  'Symfony\\Contracts\\Cache\\NamespacedPoolInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'NamespacedPoolInterface',
    'namespace' => 'Symfony\\Contracts\\Cache',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Contracts\\Cache\\NamespacedPoolInterface',
    ),
  ),
  'Symfony\\Contracts\\Cache\\TagAwareCacheInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'TagAwareCacheInterface',
    'namespace' => 'Symfony\\Contracts\\Cache',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Contracts\\Cache\\TagAwareCacheInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\AdapterInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'AdapterInterface',
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\AdapterInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Adapter\\TagAwareAdapterInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'TagAwareAdapterInterface',
    'namespace' => 'Symfony\\Component\\Cache\\Adapter',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Adapter\\TagAwareAdapterInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Marshaller\\MarshallerInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'MarshallerInterface',
    'namespace' => 'Symfony\\Component\\Cache\\Marshaller',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Marshaller\\MarshallerInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\PruneableInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'PruneableInterface',
    'namespace' => 'Symfony\\Component\\Cache',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\PruneableInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\ResettableInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ResettableInterface',
    'namespace' => 'Symfony\\Component\\Cache',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\ResettableInterface',
    ),
  ),
  'Symfony\\Component\\Cache\\Traits\\CachedValueInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'CachedValueInterface',
    'namespace' => 'Symfony\\Component\\Cache\\Traits',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Cache\\Traits\\CachedValueInterface',
    ),
  ),
  'Symfony\\Component\\Filesystem\\Exception\\ExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ExceptionInterface',
    'namespace' => 'Symfony\\Component\\Filesystem\\Exception',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Filesystem\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\Filesystem\\Exception\\IOExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'IOExceptionInterface',
    'namespace' => 'Symfony\\Component\\Filesystem\\Exception',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Filesystem\\Exception\\IOExceptionInterface',
    ),
  ),
  'Stringable' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Stringable',
    'namespace' => '\\',
    'extends' => 
    array (
      0 => 'FluxMedia_Stringable',
    ),
  ),
  'Symfony\\Component\\Process\\Exception\\ExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ExceptionInterface',
    'namespace' => 'Symfony\\Component\\Process\\Exception',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Process\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\Process\\Pipes\\PipesInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'PipesInterface',
    'namespace' => 'Symfony\\Component\\Process\\Pipes',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\Process\\Pipes\\PipesInterface',
    ),
  ),
  'Symfony\\Contracts\\Service\\ContainerAwareInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ContainerAwareInterface',
    'namespace' => 'Symfony\\Contracts\\Service',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Contracts\\Service\\ContainerAwareInterface',
    ),
  ),
  'Symfony\\Contracts\\Service\\ContainerProviderInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ContainerProviderInterface',
    'namespace' => 'Symfony\\Contracts\\Service',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Contracts\\Service\\ContainerProviderInterface',
    ),
  ),
  'Symfony\\Contracts\\Service\\ResetInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ResetInterface',
    'namespace' => 'Symfony\\Contracts\\Service',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Contracts\\Service\\ResetInterface',
    ),
  ),
  'Symfony\\Contracts\\Service\\ServiceCollectionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ServiceCollectionInterface',
    'namespace' => 'Symfony\\Contracts\\Service',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Contracts\\Service\\ServiceCollectionInterface',
    ),
  ),
  'Symfony\\Contracts\\Service\\ServiceProviderInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ServiceProviderInterface',
    'namespace' => 'Symfony\\Contracts\\Service',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Contracts\\Service\\ServiceProviderInterface',
    ),
  ),
  'Symfony\\Contracts\\Service\\ServiceSubscriberInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ServiceSubscriberInterface',
    'namespace' => 'Symfony\\Contracts\\Service',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Contracts\\Service\\ServiceSubscriberInterface',
    ),
  ),
  'Symfony\\Component\\VarExporter\\Exception\\ExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ExceptionInterface',
    'namespace' => 'Symfony\\Component\\VarExporter\\Exception',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\VarExporter\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\VarExporter\\LazyObjectInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'LazyObjectInterface',
    'namespace' => 'Symfony\\Component\\VarExporter',
    'extends' => 
    array (
      0 => 'FluxMedia\\Symfony\\Component\\VarExporter\\LazyObjectInterface',
    ),
  ),
);

        public function __construct()
        {
            $this->includeFilePath = __DIR__ . '/autoload_alias.php';
        }

        public function autoload($class)
        {
            if (!isset($this->autoloadAliases[$class])) {
                return;
            }
            switch ($this->autoloadAliases[$class]['type']) {
                case 'class':
                        $this->load(
                            $this->classTemplate(
                                $this->autoloadAliases[$class]
                            )
                        );
                    break;
                case 'interface':
                    $this->load(
                        $this->interfaceTemplate(
                            $this->autoloadAliases[$class]
                        )
                    );
                    break;
                case 'trait':
                    $this->load(
                        $this->traitTemplate(
                            $this->autoloadAliases[$class]
                        )
                    );
                    break;
                default:
                    // Never.
                    break;
            }
        }

        private function load(string $includeFile)
        {
            file_put_contents($this->includeFilePath, $includeFile);
            include $this->includeFilePath;
            file_exists($this->includeFilePath) && unlink($this->includeFilePath);
        }

        private function classTemplate(array $class): string
        {
            $abstract = $class['isabstract'] ? 'abstract ' : '';
            $classname = $class['classname'];
            if (isset($class['namespace'])) {
                $namespace = "namespace {$class['namespace']};";
                $extends = '\\' . $class['extends'];
                $implements = empty($class['implements']) ? ''
                : ' implements \\' . implode(', \\', $class['implements']);
            } else {
                $namespace = '';
                $extends = $class['extends'];
                $implements = !empty($class['implements']) ? ''
                : ' implements ' . implode(', ', $class['implements']);
            }
            return <<<EOD
                <?php
                $namespace
                $abstract class $classname extends $extends $implements {}
                EOD;
        }

        private function interfaceTemplate(array $interface): string
        {
            $interfacename = $interface['interfacename'];
            $namespace = isset($interface['namespace'])
            ? "namespace {$interface['namespace']};" : '';
            $extends = isset($interface['namespace'])
            ? '\\' . implode('\\ ,', $interface['extends'])
            : implode(', ', $interface['extends']);
            return <<<EOD
                <?php
                $namespace
                interface $interfacename extends $extends {}
                EOD;
        }
        private function traitTemplate(array $trait): string
        {
            $traitname = $trait['traitname'];
            $namespace = isset($trait['namespace'])
            ? "namespace {$trait['namespace']};" : '';
            $uses = isset($trait['namespace'])
            ? '\\' . implode(';' . PHP_EOL . '    use \\', $trait['use'])
            : implode(';' . PHP_EOL . '    use ', $trait['use']);
            return <<<EOD
                <?php
                $namespace
                trait $traitname { 
                    use $uses; 
                }
                EOD;
        }
    }

    spl_autoload_register([ new AliasAutoloader(), 'autoload' ]);
}
