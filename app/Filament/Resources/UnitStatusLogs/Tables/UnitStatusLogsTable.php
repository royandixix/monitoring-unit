<?php

namespace App\Filament\Resources\UnitStatusLogs\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UnitStatusLogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('row_number')
                    ->label('No')
                    ->rowIndex()
                    ->alignCenter(),

                TextColumn::make('unit.unit_code')
                    ->label('Nomor Lambung')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('unit.unit_group')
                    ->label('Kelompok')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'A2B' => 'info',
                        'HAULER' => 'warning',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('project.name')
                    ->label('Project')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('unit.equipmentCategory.name')
                    ->label('Jenis Unit')
                    ->searchable(),

                TextColumn::make('activity.name')
                    ->label('Aktivitas')
                    ->placeholder('Belum diisi')
                    ->searchable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'ON' => 'success',
                        'BD' => 'danger',
                        'STB READY' => 'warning',
                        'STS NO OP' => 'gray',
                        'NO INFO' => 'secondary',
                        default => 'secondary',
                    }),

                TextColumn::make('position')
                    ->label('Posisi')
                    ->placeholder('Belum diisi')
                    ->searchable(),

                TextColumn::make('start_bd')
                    ->label('Start BD')
                    ->dateTime('d M Y H:i')
                    ->placeholder('-')
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('PIC')
                    ->placeholder('Belum ada PIC')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Waktu Update')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
