<?php

namespace App\Filament\Resources\UpdateUnitStatuses\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UpdateUnitStatusesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('row_number')
                    ->label('No')
                    ->rowIndex()
                    ->alignCenter(),

                TextColumn::make('unit_code')
                    ->label('Nomor Lambung')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('unit_group')
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

                TextColumn::make('equipmentCategory.name')
                    ->label('Jenis Unit')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('current_status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'ON' => 'success',
                        'BD' => 'danger',
                        'STB READY' => 'warning',
                        'STS NO OP' => 'gray',
                        'NO INFO' => 'secondary',
                        default => 'secondary',
                    })
                    ->sortable(),

                TextColumn::make('activity.name')
                    ->label('Aktivitas')
                    ->placeholder('Belum diisi')
                    ->searchable(),

                TextColumn::make('current_position')
                    ->label('Posisi')
                    ->placeholder('Belum diisi')
                    ->searchable(),

                TextColumn::make('current_start_bd')
                    ->label('Start BD')
                    ->dateTime('d M Y H:i')
                    ->placeholder('-')
                    ->sortable(),

                TextColumn::make('updatedBy.name')
                    ->label('PIC')
                    ->placeholder('Belum ada PIC')
                    ->searchable(),

                TextColumn::make('last_updated_at')
                    ->label('Waktu Update')
                    ->dateTime('d M Y H:i')
                    ->placeholder('Belum pernah update')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('project_id')
                    ->label('Project')
                    ->relationship('project', 'name'),

                SelectFilter::make('equipment_category_id')
                    ->label('Jenis Unit')
                    ->relationship('equipmentCategory', 'name'),

                SelectFilter::make('current_status')
                    ->label('Status')
                    ->options([
                        'ON' => 'ON',
                        'BD' => 'BD / Breakdown',
                        'STB READY' => 'STB READY',
                        'STS NO OP' => 'STS NO OP',
                        'NO INFO' => 'NO INFO',
                    ]),
            ])
            ->defaultSort('last_updated_at', 'desc')
            ->recordActions([
                EditAction::make()
                    ->label('Update Status')
                    ->icon('heroicon-o-pencil-square'),
            ]);
    }
}
